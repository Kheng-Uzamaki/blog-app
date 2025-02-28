          <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
              <form action="{{route('home')}}" method="GET">
                @foreach(collect(request()->query)->only(['category_id','tag_id']) as $key => $value)
                  <input type="hidden" name="{{ $key }}" value="{{ $value }}">

                @endforeach
                  <div class="input-group">
                    <input
                      class="form-control"
                      type="text"
                      name="search"
                      placeholder="Enter search term..."
                      aria-label="Enter search term..."
                      aria-describedby="button-search"
                    />
                    <button
                      class="btn btn-primary"
                      id="button-search"
                      type="submit"
                    >
                      Go!
                    </button>
                  </div>
              </form>
            </div>
          </div>