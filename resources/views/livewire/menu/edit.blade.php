<div>
    <div class="item-title">
        EDIT MENU
    </div>
    <form wire:submit.prevent="submit">
        <div class="field-wrapper">
            <div class="title">Menu Name</div>
            <div class="field">
                <input type="text" name="name" required wire:model="menu.name">
            </div>
            @error('menu.name')
                <div class="validation-message">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="field-wrapper">
            <div class="title">Price</div>
            <div class="field">
                <input type="number" name="price" required wire:model="menu.price">
            </div>
            @error('menu.price')
                <div class="validation-message">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="field-wrapper">
            <div class="title">Discount</div>
            <div class="field">
                <input type="number" name="discount" required wire:model="menu.discount">
            </div>
            @error('menu.discount')
                <div class="validation-message">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="field-wrapper">
            <div class="title">Category</div>
            <div class="field">
                <select class="w-full" name="name" required wire:model="menu.category_id">
                    <option value="" selected></option>
                    @foreach ($listsForFields['category'] as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            @error('menu.name')
                <div class="validation-message">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="field-wrapper">
            <div class="title">Menu Images</div>
            <div class="field">
                <input type="file" name="photo" wire:model="photo">
            </div>
            @error('photo')
                <div class="validation-message">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field-wrapper mobile">
            <div class="title"></div>
            <div class="field">
                <button type="submit" class="button">UPDATE</button>
            </div>
        </div>
    </form>
</div>
