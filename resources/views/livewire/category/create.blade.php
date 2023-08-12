<div>
    <div class="item-title">
        ADD CATEGORY
    </div>

    <form wire:submit.prevent="submit">
        <div class="field-wrapper">
            <div class="title">Category name</div>
            <div class="field">
                <input type="text" name="name" required wire:model="category.name">
            </div>
            @error('category.name')
                <div class="validation-message">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="field-wrapper mobile">
            <div class="title"></div>
            <div class="field">
                <button type="submit" class="button">ADD</button>
            </div>
        </div>
    </form>
</div>
