<div class="widget ltn__form-widget">
    <h4 class="ltn__widget-title ltn__widget-title-border-2">Booking Now</h4>
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <!-- hidden field for property -->
        <input type="hidden" name="propertySlug" value="{{ $data_properties->slug }}">


        <label for="name">Your Name</label>
        <input type="text" name="name" placeholder="Your Name*">

        <label for="email">Your Email</label>
        <input type="text" name="email" placeholder="Your e-Mail*">

        <div class="mb-4">
            <label for="phone">Contact</label>
            <input type="tel" id="phone" name="phone" placeholder="Your Phone Number*" required>
            <input type="hidden" id="full_phone" name="full_phone"> <!-- will store international format -->
        </div>

        <div class="">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Your Message"></textarea>
        </div>

        <div class="mb-4">
            <label for="start_date">Rental Duration</label>

            <select id="duration" name="duration" class="form-control no-nice-select" required>
                <option value="1">1 Month</option>
                <option value="2">2 Month</option>
                <option value="3">3 Month</option>
                <option value="4">4 Month</option>
                <option value="5">5 Month</option>
                <option value="6">6 Month</option>
            </select>
        </div>

        <div class="">
            <label for="start_date">Rental Start Date</label>
            <input type="text" id="start_date" name="start_date" class="form-control bg-white" placeholder="Input Rental Date" required>
        </div>

        <div class="">
            <label for="end_date">Lease End Date (min 1 Month)</label>
            <input type="text" id="end_date" name="end_date" class="form-control" readonly>
        </div>

        <button type="submit" class="btn theme-btn-1 submitButton">Send Messege</button>
    </form>
</div>
