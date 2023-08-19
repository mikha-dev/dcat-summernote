<div class="{{$viewClass['form-group']}}">

    <label class="{{$viewClass['label']}} control-label">{!! $label !!}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <div class="form-control {{$class}}" name="{{$name}}" id="{{$id}}" {!! $attributes !!} style="width: 100%; height: 300px;">
            {{ $value }}
        </div>

        @include('admin::form.help-block')

    </div>
</div>

<script require="@summernote" init="{!! $selector !!}">
    var opts = {!! admin_javascript_json($options) !!};

    opts.selector = '#'+id;

    if (! opts.init_instance_callback) {
        opts.init_instance_callback = function (editor) {
            editor.on('Change', function(e) {
                var html = $('#{$this->id}').summernote('code');
                $('input[name="{$name}"]').val(html);                
            });
        }
    }
    $('#{$this->id}').summernote(opts);
</script>
