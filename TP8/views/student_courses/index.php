<div class="row mb-3">
    <div class="col-md-6">
        <h2>Course Registrations</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=studentCourse&action=create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Registration
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
                        <th>Student</th>
                        <th>Course</th>
                        <th>Semester</th>
                        <th>Academic Year</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($studentCourses)): ?>
                        <tr>
                            <td colspan="7" class="text-center">No course registrations found</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($studentCourses as $sc): ?>
                            <tr>
                                <td><?= $sc['id'] ?></td>
                                <td><?= $sc['student_name'] ?> (<?= $sc['nim'] ?>)</td>
                                <td><?= $sc['course_name'] ?> (<?= $sc['course_code'] ?>) - <?= $sc['credits'] ?> credits</td>
                                <td><?= $sc['semester'] ?></td>
                                <td><?= $sc['academic_year'] ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($sc['created_at'])) ?></td>
                                <td>
                                    <a href="index.php?controller=studentCourse&action=view&id=<?= $sc['id'] ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?controller=studentCourse&action=edit&id=<?= $sc['id'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?controller=studentCourse&action=delete&id=<?= $sc['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this registration?')">
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