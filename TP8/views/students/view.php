<div class="row mb-3">
    <div class="col-md-6">
        <h2>Student Details</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=student&action=index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><?= $student['name'] ?> (<?= $student['nim'] ?>)</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">ID</th>
                        <td><?= $student['id'] ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?= $student['name'] ?></td>
                    </tr>
                    <tr>
                        <th>NIM</th>
                        <td><?= $student['nim'] ?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><?= $student['phone'] ?></td>
                    </tr>
                    <tr>
                        <th>Join Date</th>
                        <td><?= date('d-m-Y', strtotime($student['join_date'])) ?></td>
                    </tr>
                    <tr>
                        <th>Study Program</th>
                        <td><?= $student['prodi_name'] ?? 'Not assigned' ?></td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td><?= date('d-m-Y H:i:s', strtotime($student['created_at'])) ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div class="d-grid gap-2">
                    <a href="index.php?controller=student&action=edit&id=<?= $student['id'] ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Student
                    </a>
                    <a href="index.php?controller=studentCourse&action=studentCourses&id=<?= $student['id'] ?>" class="btn btn-primary">
                        <i class="fas fa-book"></i> Lihat Mata Kuliah
                    </a>
                    <a href="index.php?controller=student&action=delete&id=<?= $student['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">
                        <i class="fas fa-trash"></i> Delete Student
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>