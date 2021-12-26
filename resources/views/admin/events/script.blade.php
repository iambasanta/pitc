@section('script')
<script type="text/javascript">
    //slug
    $('#title').on('blur', function() {
        var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#slug'),
            theSlug = theTitle.replace(/&/g, '-and-')
            .replace(/[^a-z0-9-]+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/^-+|-+$/g, '');
        slugInput.val(theSlug);
    });

    // simplemde
    var simplemde2 = new SimpleMDE({
        element: $("#description")[0]
    });

    // date-time picker
    $("#published_at").flatpickr();

    $("#date").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",

    });
</script>
@endsection
