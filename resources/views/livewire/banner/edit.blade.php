<div>
    <div class="item-title">
        EDIT Banner
    </div>
    <form wire:submit.prevent="submit">
        <div class="field-wrapper">
            <div class="title">Banner Name</div>
            <div class="field">
                <input type="text" name="name" required wire:model="banner.name">
            </div>
            @error('banner.name')
                <div class="validation-message">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="field-wrapper">
            <div class="title">Banner Link</div>
            <div class="field">
                <input type="text" name="link" required wire:model="banner.link">
            </div>
            @error('banner.link')
                <div class="validation-message">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="field-wrapper">
            <div class="title">Banner Images</div>
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
