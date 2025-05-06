<div class="row mb-3">
    <div class="col-md-6">
        <h2>Edit Course Registration</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="index.php?controller=studentCourse&action=index" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Registrations
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header bg-warning">
        <h3 class="card-title">Edit Course Registration Information</h3>
    </div>
    <div class="card-body">
        <form method="post" action="index.php?controller=studentCourse&action=edit&id=<?= $studentCourse['id'] ?>">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="student_id" class="form-label">Student:</label>
                        <select name="student_id" id="student_id" class="form-select" required>
                            <option value="">Select Student</option>
                            <?php foreach ($students as $student): ?>
                                <option value="<?= $student['id'] ?>" <?= ($student['id'] == $studentCourse['student_id']) ? 'selected' : '' ?>>
                                    <?= $student['name'] ?> (<?= $student['nim'] ?>) - <?= $student['prodi_name'] ?? 'No Program' ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="course_id" class="form-label">Course:</label>
                        <select name="course_id" id="course_id" class="form-select" required>
                            <option value="">Select Course</option>
                            <?php foreach ($courses as $course): ?>
                                <option value="<?= $course['id'] ?>" <?= ($course['id'] == $studentCourse['course_id']) ? 'selected' : '' ?>>
                                    <?= $course['name'] ?> (<?= $course['code'] ?>) - <?= $course['credits'] ?> credits
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="semester" class="form-label">Semester:</label>
                        <select name="semester" id="semester" class="form-select" required>
                            <option value="">Select Semester</option>
                            <option value="Ganjil" <?= ($studentCourse['semester'] == 'Ganjil') ? 'selected' : '' ?>>Ganjil (Odd)</option>
                            <option value="Genap" <?= ($studentCourse['semester'] == 'Genap') ? 'selected' : '' ?>>Genap (Even)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="academic_year" class="form-label">Academic Year:</label>
                        <select name="academic_year" id="academic_year" class="form-select" required>
                            <option value="">Select Academic Year</option>
                            <?php 
                            $currentYear = date('Y');
                            for ($i = 0; $i < 5; $i++) {
                                $year = $currentYear - $i;
                                $nextYear = $year + 1;
                                $academicYear = $year . '/' . $nextYear;
                                $selected = ($academicYear == $studentCourse['academic_year']) ? 'selected' : '';
                                echo "<option value=\"$academicYear\" $selected>$academicYear</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="index.php?controller=studentCourse&action=index" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>