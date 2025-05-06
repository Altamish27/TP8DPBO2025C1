<div class="row mb-3">
    <div class="col-md-6">
        <h2>Courses</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=course&action=create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Course
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
                        <th>Credits</th>
                        <th>Students</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($courses)): ?>
                        <tr>
                            <td colspan="7" class="text-center">No courses found</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($courses as $course): ?>
                            <tr>
                                <td><?= $course['id'] ?></td>
                                <td><?= $course['code'] ?></td>
                                <td><?= $course['name'] ?></td>
                                <td><?= $course['credits'] ?></td>
                                <td><?= $course['student_count'] ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($course['created_at'])) ?></td>
                                <td>
                                    <a href="index.php?controller=course&action=view&id=<?= $course['id'] ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?controller=course&action=edit&id=<?= $course['id'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?controller=course&action=delete&id=<?= $course['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="index.php?controller=studentCourse&action=courseStudents&id=<?= $course['id'] ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-users"></i> Students
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