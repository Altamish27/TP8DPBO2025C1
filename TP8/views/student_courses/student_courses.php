<div class="row mb-3">
    <div class="col-md-6">
        <h2>Courses for <?= $student['name'] ?> (<?= $student['nim'] ?>)</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=student&action=view&id=<?= $student['id'] ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Student
        </a>
        <a href="index.php?controller=studentCourse&action=create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Course
        </a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-info text-white">
        <h3 class="card-title">Student Information</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> <?= $student['name'] ?></p>
                <p><strong>NIM:</strong> <?= $student['nim'] ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Study Program:</strong> <?= $student['prodi_name'] ?? 'Not assigned' ?></p>
                <p><strong>Join Date:</strong> <?= date('d-m-Y', strtotime($student['join_date'])) ?></p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Registered Courses</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Course</th>
                        <th>Credits</th>
                        <th>Semester</th>
                        <th>Academic Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($studentCourses)): ?>
                        <tr>
                            <td colspan="6" class="text-center">No courses registered for this student</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($studentCourses as $sc): ?>
                            <tr>
                                <td><?= $sc['id'] ?></td>
                                <td><?= $sc['course_name'] ?> (<?= $sc['course_code'] ?>)</td>
                                <td><?= $sc['credits'] ?></td>
                                <td><?= $sc['semester'] ?></td>
                                <td><?= $sc['academic_year'] ?></td>
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