<div class="row mb-3">
    <div class="col-md-6">
        <h2>Create Student</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=student&action=index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Students
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Student Information</h3>
    </div>
    <div class="card-body">
        <form method="post" action="index.php?controller=student&action=create">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="nim" class="form-label">NIM:</label>
                        <input type="text" name="nim" id="nim" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="join_date" class="form-label">Join Date:</label>
                        <input type="date" name="join_date" id="join_date" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group mb-3">
                <label for="prodi_id" class="form-label">Study Program:</label>
                <select name="prodi_id" id="prodi_id" class="form-select" required>
                    <option value="">Select Study Program</option>
                    <?php foreach ($prodis as $prodi): ?>
                        <option value="<?= $prodi['id'] ?>"><?= $prodi['name'] ?> (<?= $prodi['code'] ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Submit
                </button>
                <a href="index.php?controller=student&action=index" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>