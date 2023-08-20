<div class="{{$viewClass['form-group']}}">

    <label class="{{$viewClass['label']}} control-label">{!! $label !!}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <div class="form-control {{$class}}" id="{{$name}}" {!! $attributes !!}>
            {!! $value !!}
        </div>

        <input type="hidden" name="{{$name}}" value="" />
        
        @include('admin::form.help-block')

    </div>
</div>

<script require="@mikha.dev.summernote" init="{!! $selector !!}">
    var options = {!! admin_javascript_json($options) !!};

    options = $.extend({
        callbacks: {
            onChange: function(contents, $editable) {
                $('input[name="{{$name}}"]').val(contents);
            },
            onInit: function() {
             $('input[name="{{$name}}"]').val($('#'+id).summernote('code'));
            }
        }
    }, options);

    $('#'+id).summernote(options);
    
</script>
