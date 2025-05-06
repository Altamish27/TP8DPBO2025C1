<div class="row mb-3">
    <div class="col-md-6">
        <h2>Course Registration Details</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=studentCourse&action=index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Registrations
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-info text-white">
        <h3 class="card-title">Registration #<?= $studentCourse['id'] ?></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">ID</th>
                        <td><?= $studentCourse['id'] ?></td>
                    </tr>
                    <tr>
                        <th>Student</th>
                        <td><?= $studentCourse['student_name'] ?> (<?= $studentCourse['nim'] ?>)</td>
                    </tr>
                    <tr>
                        <th>Course</th>
                        <td><?= $studentCourse['course_name'] ?> (<?= $studentCourse['course_code'] ?>)</td>
                    </tr>
                    <tr>
                        <th>Credits</th>
                        <td><?= $studentCourse['credits'] ?></td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td><?= $studentCourse['semester'] ?></td>
                    </tr>
                    <tr>
                        <th>Academic Year</th>
                        <td><?= $studentCourse['academic_year'] ?></td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td><?= date('d-m-Y H:i:s', strtotime($studentCourse['created_at'])) ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div class="d-grid gap-2">
                    <a href="index.php?controller=studentCourse&action=edit&id=<?= $studentCourse['id'] ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Registration
                    </a>
                    <a href="index.php?controller=studentCourse&action=delete&id=<?= $studentCourse['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this registration?')">
                        <i class="fas fa-trash"></i> Delete Registration
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>