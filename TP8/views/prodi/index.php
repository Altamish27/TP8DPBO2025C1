<div class="row mb-3">
    <div class="col-md-6">
        <h2>Program Studi</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=prodi&action=create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Program Studi
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Students</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($prodis)): ?>
                        <tr>
                            <td colspan="6" class="text-center">No study programs found</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($prodis as $prodi): ?>
                            <tr>
                                <td><?= $prodi['id'] ?></td>
                                <td><?= $prodi['code'] ?></td>
                                <td><?= $prodi['name'] ?></td>
                                <td><?= $prodi['student_count'] ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($prodi['created_at'])) ?></td>
                                <td>
                                    <a href="index.php?controller=prodi&action=view&id=<?= $prodi['id'] ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?controller=prodi&action=edit&id=<?= $prodi['id'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?controller=prodi&action=delete&id=<?= $prodi['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this study program?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>