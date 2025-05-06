<div class="row mb-3">
    <div class="col-md-6">
        <h2>Mahasiwa</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=student&action=create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Mahasiwa
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
                        <th>Name</th>
                        <th>NIM</th>
                        <th>Phone</th>
                        <th>Join Date</th>
                        <th>Program Studi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($students)): ?>
                        <tr>
                            <td colspan="7" class="text-center">No students found</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?= $student['id'] ?></td>
                                <td><?= $student['name'] ?></td>
                                <td><?= $student['nim'] ?></td>
                                <td><?= $student['phone'] ?></td>
                                <td><?= date('d-m-Y', strtotime($student['join_date'])) ?></td>
                                <td><?= $student['prodi_name'] ?? 'Not assigned' ?></td>
                                <td>
                                    <a href="index.php?controller=student&action=view&id=<?= $student['id'] ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?controller=student&action=edit&id=<?= $student['id'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?controller=student&action=delete&id=<?= $student['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="index.php?controller=studentCourse&action=studentCourses&id=<?= $student['id'] ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-book"></i> Courses
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