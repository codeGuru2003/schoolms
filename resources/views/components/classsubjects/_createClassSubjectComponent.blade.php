<form id="createSubjectForm" action="{{ route('classsubjects.store', $classId) }}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="subject_id" class="form-label">Subject</label>
        <select name="subject_id" id="subject_id" required class="form-control">
            <option value="0">Select Subject</option>
            @foreach($subjects as $subjectId => $subjectName)
                <option value="{{ $subjectId }}">{{ $subjectName }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="faculty_id" class="form-label">Teacher</label>
        <select name="faculty_id" id="faculty_id" required class="form-control">
            <option value="0">Select Teacher</option>
            @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}">{{ $faculty->firstname }} {{ $faculty->middlename }} {{ $faculty->lastname }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="isactive" value="1">
        <label class="form-check-label" for="isactive">
          Is Active
        </label>
    </div>
    <button type="submit" class="btn btn-success">Add Subject</button>
</form>
