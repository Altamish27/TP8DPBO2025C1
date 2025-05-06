<div class="row mb-3">
    <div class="col-md-6">
        <h2>Study Program Details</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=prodi&action=index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Study Programs
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><?= $prodi['name'] ?> (<?= $prodi['code'] ?>)</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">ID</th>
                        <td><?= $prodi['id'] ?></td>
                    </tr>
                    <tr>
                        <th>Code</th>
                        <td><?= $prodi['code'] ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?= $prodi['name'] ?></td>
                    </tr>
                    <tr>
                        <th>Students</th>
                        <td><?= $prodi['student_count'] ?></td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td><?= date('d-m-Y H:i:s', strtotime($prodi['created_at'])) ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div class="d-grid gap-2">
                    <a href="index.php?controller=prodi&action=edit&id=<?= $prodi['id'] ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Study Program
                    </a>
                    <?php if ($prodi['student_count'] == 0): ?>
                        <a href="index.php?controller=prodi&action=delete&id=<?= $prodi['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this study program?')">
                            <i class="fas fa-trash"></i> Delete Study Program
                        </a>
                    <?php else: ?>
                        <button class="btn btn-danger" disabled title="Cannot delete study program with associated students">
                            <i class="fas fa-trash"></i> Delete Study Program
                        </button>
                        <small class="text-danger">Cannot delete study program with associated students</small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>