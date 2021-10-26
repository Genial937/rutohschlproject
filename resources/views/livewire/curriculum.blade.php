<div class="row">
    <div class="col-md-12 text-right">
        <a href="javascript:void(0)" wire:click="increment()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Academic Year</label>
            <input type="text" class="form-control" name="year" required>
        </div>
    </div>
  @for ($i = 1; $i <= $steps; $i++)
  <div class="col-md-6">
    <div class="form-group">
        <label for="">Semester</label>
        <input type="text" name="semester[]" class="form-control" required>
    </div>
</div>
  @endfor
</div>