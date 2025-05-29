<!-- Add Review Modal -->
<div class="modal fade" id="addReviewModal" tabindex="-1" aria-labelledby="addReviewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h5 class="modal-title fs-5 mb-2 fw-bold" id="addReviewModalLabel">Add a Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="mb-3">
            <label for="reviewerName" class="form-label">Your Name (optional)</label>
            <input type="text" class="form-control" id="reviewerName" placeholder="Anonymous">
          </div>

          <div class="mb-3">
            <label class="form-label">Rating</label>
            <select class="form-select" id="reviewRating" required>
              <option value="">Choose...</option>
              <option value="5">★★★★★</option>
              <option value="4">★★★★☆</option>
              <option value="3">★★★☆☆</option>
              <option value="2">★★☆☆☆</option>
              <option value="1">★☆☆☆☆</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="reviewText" class="form-label">Your Review</label>
            <textarea class="form-control" id="reviewText" rows="4" required></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn rounded-pill btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn rounded-pill bg-purple text-light">Submit Review</button>
        </div>
      </form>
    </div>
  </div>
</div>
