<div class="widget ltn__form-widget">
    <h4 class="ltn__widget-title ltn__widget-title-border-2">Booking Now</h4>
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <input type="hidden" name="propertySlug" value="{{ $data_properties->slug }}">
        <input type="text" name="name" placeholder="Your Name*">
        <input type="text" name="email" placeholder="Your e-Mail*">
        <input type="text" name="phone" placeholder="Your Phone Number*">

        <div class="mb-3">
            <label for="start_date">Tanggal Mulai Sewa</label>

            <select id="duration" name="duration" class="form-control no-nice-select" required>
                <option value="1">1 Bulan</option>
                <option value="2">2 Bulan</option>
                <option value="3">3 Bulan</option>
            </select>
        </div>

        <div class="">
            <label for="start_date">Tanggal Mulai Sewa</label>
            <input type="text" id="start_date" name="start_date" class="form-control bg-white" required>
        </div>

        <div class="">
            <label for="end_date">Tanggal Akhir Sewa (otomatis 1 bulan)</label>
            <input type="text" id="end_date" name="end_date" class="form-control" readonly>
        </div>

        <label for="address">Address</label>
        <textarea name="address" id="address" cols="30" rows="10"></textarea>

        <button type="submit" class="btn theme-btn-1">Send Messege</button>
    </form>
</div>
