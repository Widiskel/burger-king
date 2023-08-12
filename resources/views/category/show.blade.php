@extends('layouts.admin')

@section('bodyClass', 'menus accounts')
@section('title','Category')

@section('account-main')
    <div class="item-lists">
        <div class="item-title">
            DETAIL CATEGORY
        </div>
        <hr>
        <table>
            <tr>
                <td>Category name</td>
                <td>:</td>
                <td>{{$category->name}}</td>
            </tr>
        </table>
        <hr>
        <br>
        <a class="button " href="{{route('category.index')}}">
            BACK
        </a>
    </div>
@endsection
