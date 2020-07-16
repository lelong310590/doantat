<?php
/**
 * editor.blade.php
 * Created by: trainheartnet
 * Created at: 7/15/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<div class="form-group mb-3">
    <label for="{{$id}}">{{$title}}</label>
    <textarea name="{{$name}}" id="ckeditor-{{$id}}" class="form-control">
        {{$defaultValue}}
    </textarea>
</div>


@push('js-init')
<script type="text/javascript">
    ClassicEditor
        .create(document.querySelector('#ckeditor-{{$id}}'), {
            toolbar: [
                "alignment", '|', "blockQuote", "bold", "selectAll", "undo", "redo", "fontBackgroundColor",
                "fontColor", "fontFamily", "fontSize", "heading", '|', "highlight", "removeHighlight", "imageTextAlternative", "imageStyle:full",
                "imageUpload", "imageStyle:side",
                "indent", "outdent", "italic", "link", "numberedList", "bulletedList", "MathType", "ChemType", "mediaEmbed",
                "removeFormat", "insertTable", "tableColumn", "tableRow", "mergeTableCells", "tableCellProperties", "tableProperties", "underline"
            ],
        })
        .then( editor => {
            //console.log( Array.from( editor.ui.componentFactory.names() ) );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
