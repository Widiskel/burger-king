<?php

namespace App;
use App\Models\Menu;
use Illuminate\Support\Carbon;

class Helper
{
    public static function generateSlug($string, $separator = '-')
    {
        $string = trim($string);
        $string = mb_strtolower($string, 'UTF-8');
        $string = preg_replace('/[^a-z0-9\-]/', ' ', $string);
        $string = preg_replace('/\s+/', $separator, $string);
        $string = trim($string, $separator);

        return $string;
    }

    public static function toIdr($number)
    {
        $idr = 'Rp ' . number_format($number, 0, ',', '.');
        return $idr;
    }

    public static function getCartSummary($menuList)
    {
        $subtotal = 0;
        $grandTotal = 0;
        foreach ($menuList as $idx => $menu) {
            $item = Menu::find($menu['code']);
            $subtotal += ($item->price - $item->discount) * $menu['quantity'];
            $grandTotal = $subtotal;
        }
        return [
            'subtotal' => $subtotal,
            'grandtotal' => $grandTotal,
        ];
    }

    public static function generateCartHtml($cart_item)
    {
        $cart_data = '';
        $summary = self::getCartSummary($cart_item);

        foreach ($cart_item as $item) {
            $menu = Menu::find($item['code']);

            $cart_data =
                $cart_data .
                '
            <tr>
                <td>
                    <img src="' .
                $menu->getFirstMedia('menu_image')->getUrl() .
                '"/>
                </td>
                <td class="cart-list-description" style="white-space: nowrap">
                    ' .
                $menu->name .
                '
                </td>
                <td style ="white-space: nowrap">x ' .
                $item['quantity'] .
                ' </td>
                <td align="right" style="white-space: nowrap">
                    <span class="item-subtotal discounted">' .
                self::toIdr($menu->price - $menu->discount) .
                '</span>
                    <span class="item-subtotal original">' .
                self::toIdr($menu->price) .
                '</span>
                </td>
            </tr>
            ';
        }

        return '
        <div class="cart-list">
            <span class="triangle"></span>
            <div class="loading-cart hide">
                <img src="' .
            asset('img/loading_cart.gif') .
            '"/>
            </div>
            <p class="cart-error hide">Cart is temporarily unavailable.</p>
            <div class="cart-content-data">
                <div class="card-content-data-wrapper">
                    <table class="table-floating">
                        ' .
            $cart_data .
            '
                    </table>
                    <div class="subtotal">
                        <div class="text">
                            <span>SUBTOTAL</span>
                        </div>
                        <div class="total">
                            ' .
            self::toIdr($summary['subtotal']) .
            '
                        </div>
                    </div>
                    <a href="' .
            route('cart','preview') .
            '" class="button button-order-now">Go To Cart</a>
                </div>
            </div>
        </div>
        ';
    }

    public static function formatTimeframe($value){
        $value = Carbon::createFromFormat('Y-m-d H:i:s', $value);

        return $value;
    }
}
