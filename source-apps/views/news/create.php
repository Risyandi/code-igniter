<div class="container shadow-sm p-3 bg-white rounded">
    <h2><?php echo $title; ?></h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('news/create'); ?>
    <div class="form-group">
        <label for="input-title">Title</label>
        <input id="input-title" name="title" type="input" class="form-control"  placeholder="Title news">
        <small class="form-text text-muted">Important for the filled this field.</small>
    </div>
    <div class="form-group">
        <label for="input-description">Description</label>
        <textarea id="input-description" name="text" class="form-control" placeholder="Description of news" rows="5" ></textarea>
        <small class="form-text text-muted">Important for the filled this field.</small>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Create News</button> 
</form>
</div>