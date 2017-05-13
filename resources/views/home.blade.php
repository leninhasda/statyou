@extends('layout')

@section('content')
    <div class="blog-header">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
    </div>

    <section>
        @for ($i = 0; $i < 10; $i++)
        <div class="panel stat-block">
            <div class="panel-body clearfix">
                <div class="pull-left">
                </div>
                <div class="pull-right">
                    <div class="author-info">
                        <h3>Mr. John Doe</h3>
                    </div>
                    <div class="content">
                        <p>This is simple status</p>
                    </div>
                    <div class="footer">
                        <a href="#">like</a>
                        <a href="#">reply</a>
                    </div>
                </div>
            </div>
        </div><!-- /.stat-block -->
        @endfor
    </section><!-- /.row -->

    <section>
        <nav aria-label="Page navigation" class="text-center">
            <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1 Apr '17</a></li>
                <li><a href="#">2 Apr '17</a></li>
                <li><a href="#">3 Apr '17</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
            </ul>
        </nav>
    </section>
@endsection