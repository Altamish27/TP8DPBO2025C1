<div class="row mb-3">
    <div class="col-md-6">
        <h2>Create Study Program</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=prodi&action=index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Study Programs
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Study Program Information</h3>
    </div>
    <div class="card-body">
        <form method="post" action="index.php?controller=prodi&action=create">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="code" class="form-label">Code:</label>
                        <input type="text" name="code" id="code" class="form-control" required>
                        <small class="text-muted">Enter a unique code for the study program (e.g., TI, SI)</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        <small class="text-muted">Enter the full name of the study program</small>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Submit
                </button>
                <a href="index.php?controller=prodi&action=index" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>