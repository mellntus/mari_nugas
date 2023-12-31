<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: -webkit-fill-available">
    <a id="sidebar-header" href="/student/assignment" class="d-flex align-items-center mb-3 mb-md-0 text-white text-decoration-none" style="align-self: center; flex-flow:column;">
        <img class="mb-1" alt="Bootstrap">
    </a>
    <hr>
    <ul class="nav nav-item nav-pills flex-column mb-auto">
      <li>
        <a href="/student/assignment" class="nav-link text-white" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Assignment
        </a>
      </li>
      <li>
        <a href="/notes" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Notes
        </a>
      </li>
      <li>
        <a href="/profile" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Profile
        </a>
      </li>
      <li>
        <a href="/student/study_groups" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Study Groups
        </a>
      </li>
    </ul>
    <hr>
    <div class="logout">
        {{-- CSRF Here --}}
        <form action="/logout" method="POST">
          @csrf
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                  <button class="btn btn-danger" type="submit" style="width: -webkit-fill-available">
                    Logout
                  </button>
                </li>
            </ul>
        </form>
    </div>
</div>