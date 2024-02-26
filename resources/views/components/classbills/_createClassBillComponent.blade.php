<form id="createBillForm" action="{{ route('classbills.store', $classId) }}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="text" class="form-control" id="amount" name="amount" required>
    </div>
    <div class="form-group mb-3">
        <label for="currency_id" class="form-label">Currency</label>
        <select name="currency_id" id="currency_id" required class="form-control">
            <option value="0">Select Currency</option>
            @foreach($currencies as $currencyId => $currencyCode)
                <option value="{{ $currencyId }}">{{ $currencyCode }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" style="width:20px; height: 20px">
        <label class="form-check-label " for="is_active">
            <span style="font-size: 20px">
            Is Active
            </span>
        </label>
    </div>
    <button type="submit" class="btn btn-success">Add Bill</button>
</form>
