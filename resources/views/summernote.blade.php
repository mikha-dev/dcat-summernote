<div class="{{$viewClass['form-group']}}">

    <label class="{{$viewClass['label']}} control-label">{!! $label !!}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <div class="form-control {{$class}}" id="{{$name}}" {!! $attributes !!}>
            {{ $value }}
        </div>

        <input type="hidden" name="{{$name}}" value="{{ $value }}" />
        
        @include('admin::form.help-block')

    </div>
</div>

<script require="@mikha.dev.summernote" init="{!! $selector !!}">
    var options = {!! admin_javascript_json($options) !!};

    options = $.extend({
        callbacks: {
            onChange: function(contents, $editable) {
                $('input[name="{{$name}}"]').val(contents);                
            }
        }
    }, options);

    $('#'+id).summernote(options);
</script>
