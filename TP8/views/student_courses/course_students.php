<div class="row mb-3">
    <div class="col-md-6">
        <h2>Students Enrolled in <?= $course['name'] ?> (<?= $course['code'] ?>)</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=course&action=view&id=<?= $course['id'] ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Course
        </a>
        <a href="index.php?controller=studentCourse&action=create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Student
        </a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-info text-white">
        <h3 class="card-title">Course Information</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> <?= $course['name'] ?></p>
                <p><strong>Code:</strong> <?= $course['code'] ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Credits:</strong> <?= $course['credits'] ?></p>
                <p><strong>Total Students:</strong> <?= count($courseStudents) ?></p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Enrolled Students</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Student</th>
                        <th>NIM</th>
                        <th>Semester</th>
                        <th>Academic Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($courseStudents)): ?>
                        <tr>
                            <td colspan="6" class="text-center">No students enrolled in this course</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($courseStudents as $cs): ?>
                            <tr>
                                <td><?= $cs['id'] ?></td>
                                <td><?= $cs['student_name'] ?></td>
                                <td><?= $cs['nim'] ?></td>
                                <td><?= $cs['semester'] ?></td>
                                <td><?= $cs['academic_year'] ?></td>
                                <td>
                                    <a href="index.php?controller=studentCourse&action=view&id=<?= $cs['id'] ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?controller=studentCourse&action=edit&id=<?= $cs['id'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?controller=studentCourse&action=delete&id=<?= $cs['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this registration?')">
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