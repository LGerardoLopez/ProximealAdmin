@if($customFields)
<h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
<!-- Brand Field -->
<div class="form-group row ">
  {!! Form::label('brand', trans("lang.vehicle_brand"), ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    {!! Form::text('brand', null,  ['class' => 'form-control','placeholder'=>  trans("lang.vehicle_brand_placeholder")]) !!}
    <div class="form-text text-muted">
      {{ trans("lang.vehicle_brand_help") }}
    </div>
  </div>
</div>

<!-- Model Field -->
<div class="form-group row ">
    {!! Form::label('model', trans("lang.vehicle_model"), ['class' => 'col-3 control-label text-right']) !!}
    <div class="col-9">
      {!! Form::text('model', null,  ['class' => 'form-control','placeholder'=>  trans("lang.vehicle_model_placeholder")]) !!}
      <div class="form-text text-muted">
        {{ trans("lang.vehicle_model_help") }}
      </div>
    </div>
  </div>

<!-- Plates Field -->
<div class="form-group row ">
    {!! Form::label('plates', trans("lang.vehicle_plates"), ['class' => 'col-3 control-label text-right']) !!}
    <div class="col-9">
      {!! Form::text('plates', null,  ['class' => 'form-control','placeholder'=>  trans("lang.vehicle_plates_placeholder")]) !!}
      <div class="form-text text-muted">
        {{ trans("lang.vehicle_plates_help") }}
      </div>
    </div>
  </div>

</div>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">

<!-- Image Field -->
<div class="form-group row">
  {!! Form::label('image', trans("lang.vehicle_image"), ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    <div style="width: 100%" class="dropzone image" id="image" data-field="image">
      <input type="hidden" name="image">
    </div>
    <a href="#loadMediaModal" data-dropzone="image" data-toggle="modal" data-target="#mediaModal" class="btn btn-outline-{{setting('theme_color','primary')}} btn-sm float-right mt-1">{{ trans('lang.media_select')}}</a>
    <div class="form-text text-muted w-50">
      {{ trans("lang.vehicle_image_help") }}
    </div>
  </div>
</div>
@prepend('scripts')
<script type="text/javascript">
    var var15866134771240834480ble = '';
    @if(isset($vehicle) && $vehicle->hasMedia('image'))
    var15866134771240834480ble = {
        name: "{!! $vehicle->getFirstMedia('image')->name !!}",
        size: "{!! $vehicle->getFirstMedia('image')->size !!}",
        type: "{!! $vehicle->getFirstMedia('image')->mime_type !!}",
        collection_name: "{!! $vehicle->getFirstMedia('image')->collection_name !!}"};
    @endif
    var dz_var15866134771240834480ble = $(".dropzone.image").dropzone({
        url: "{!!url('uploads/store')!!}",
        addRemoveLinks: true,
        maxFiles: 1,
        init: function () {
        @if(isset($vehicle) && $vehicle->hasMedia('image'))
            dzInit(this,var15866134771240834480ble,'{!! url($vehicle->getFirstMediaUrl('image','thumb')) !!}')
        @endif
        },
        accept: function(file, done) {
            dzAccept(file,done,this.element,"{!!config('medialibrary.icons_folder')!!}");
        },
        sending: function (file, xhr, formData) {
            dzSending(this,file,formData,'{!! csrf_token() !!}');
        },
        maxfilesexceeded: function (file) {
            dz_var15866134771240834480ble[0].mockFile = '';
            dzMaxfile(this,file);
        },
        complete: function (file) {
            dzComplete(this, file, var15866134771240834480ble, dz_var15866134771240834480ble[0].mockFile);
            dz_var15866134771240834480ble[0].mockFile = file;
        },
        removedfile: function (file) {
            dzRemoveFile(
                file, var15866134771240834480ble, '{!! url("vehicles/remove-media") !!}',
                'image', '{!! isset($vehicle) ? $vehicle->id : 0 !!}', '{!! url("uplaods/clear") !!}', '{!! csrf_token() !!}'
            );
        }
    });
    dz_var15866134771240834480ble[0].mockFile = var15866134771240834480ble;
    dropzoneFields['image'] = dz_var15866134771240834480ble;
</script>
@endprepend
</div>
@if($customFields)
<div class="clearfix"></div>
<div class="col-12 custom-field-container">
  <h5 class="col-12 pb-4">{!! trans('lang.custom_field_plural') !!}</h5>
  {!! $customFields !!}
</div>
@endif
<!-- Submit Field -->
<div class="form-group col-12 text-right">
  <button type="submit" class="btn btn-{{setting('theme_color')}}" ><i class="fa fa-save"></i> {{trans('lang.save')}} {{trans('lang.vehicle')}}</button>
  <a href="{!! route('vehicles.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
