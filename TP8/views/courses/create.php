<div class="row mb-3">
    <div class="col-md-6">
        <h2>Create Course</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=course&action=index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Courses
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Course Information</h3>
    </div>
    <div class="card-body">
        <form method="post" action="index.php?controller=course&action=create">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="code" class="form-label">Code:</label>
                        <input type="text" name="code" id="code" class="form-control" required>
                        <small class="text-muted">Enter a unique code for the course (e.g., MK001)</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        <small class="text-muted">Enter the full name of the course</small>
                    </div>
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label for="credits" class="form-label">Credits:</label>
                <select name="credits" id="credits" class="form-select" required>
                    <option value="">Select Credits</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <small class="text-muted">Select the number of credits for this course</small>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Submit
                </button>
                <a href="index.php?controller=course&action=index" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>