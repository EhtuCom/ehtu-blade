<input class="daterange form-control" style="width: 260px;" [size]="myInput.value.length"
    x-data
    x-ref="input"
    {{--   @apply.daterangepicker="$dispatch('input', $event.target.value)"--}}
    {{--    x-init="new daterangepicker()"--}}
    @"apply.daterangepicker"="$dispatch('input', $event.target.val)"
    type="text"
    {{ $attributes }}
>

<script>
    window.addEventListener("load", function (event)
        {
            $('.daterange').daterangepicker({
                opens: 'left',
                "showDropdowns": true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                "autoApply": false,
                "locale": {
                    "format": "YYYY-MM-DD",
                    "separator": " - ",
                    "applyLabel": "Apply",
                    "cancelLabel": "Cancel",
                    "fromLabel": "From",
                    "toLabel": "To",
                    "customRangeLabel": "Custom",
                    "weekLabel": "W",
                    "daysOfWeek": [ "Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                    "monthNames": [ "January", "February", "March", "April", "May", "June", "July"
                        , "August", "September", "October", "November", "December"],
                    "firstDay": 1
                },
            });

            $('.daterange').on('change', function (e) {
                @this.set('{{ $id }}', e.target.value);
            });
        }
        , false
    );
</script>

{{-- Docs: http://www.daterangepicker.com/#examples --}}
@push('scripts')
    <script>
        // $('.daterange').daterangepicker();

        $(function() {
            // ... func
        });
    </script>

@endpush
