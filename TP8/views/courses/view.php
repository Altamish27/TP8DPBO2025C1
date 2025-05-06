<div class="row mb-3">
    <div class="col-md-6">
        <h2>Course Details</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=course&action=index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Courses
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title"><?= $course['name'] ?> (<?= $course['code'] ?>)</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">ID</th>
                        <td><?= $course['id'] ?></td>
                    </tr>
                    <tr>
                        <th>Code</th>
                        <td><?= $course['code'] ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?= $course['name'] ?></td>
                    </tr>
                    <tr>
                        <th>Credits</th>
                        <td><?= $course['credits'] ?></td>
                    </tr>
                    <tr>
                        <th>Students</th>
                        <td><?= $course['student_count'] ?></td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td><?= date('d-m-Y H:i:s', strtotime($course['created_at'])) ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div class="d-grid gap-2">
                    <a href="index.php?controller=course&action=edit&id=<?= $course['id'] ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Course
                    </a>
                    <a href="index.php?controller=studentCourse&action=courseStudents&id=<?= $course['id'] ?>" class="btn btn-primary">
                        <i class="fas fa-users"></i> View Enrolled Students
                    </a>
                    <?php if ($course['student_count'] == 0): ?>
                        <a href="index.php?controller=course&action=delete&id=<?= $course['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">
                            <i class="fas fa-trash"></i> Delete Course
                        </a>
                    <?php else: ?>
                        <button class="btn btn-danger" disabled title="Cannot delete course with enrolled students">
                            <i class="fas fa-trash"></i> Delete Course
                        </button>
                        <small class="text-danger">Cannot delete course with enrolled students</small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>