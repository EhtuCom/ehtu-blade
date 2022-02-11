<div class="align-middle d-flex justify-content-center">
    <span
        x-data="{ open: false }"
        x-init="
            @this.on('notify-saved', () => {
                setTimeout(() => {open = false}, 1000);
                open = true;
            })
        "
        x-show.transition.out.duration.500ms="open"
        style="display: none;"
    >

          <span class="spinner-border spinner-border-sm  text-danger align-middle" role="status" aria-hidden="true"></span>
          {{ __("Saved!") }}

    </span>
</div>
