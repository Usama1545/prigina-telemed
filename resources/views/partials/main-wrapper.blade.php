<!-- Main Wrapper -->
@if(Route::is(['index-3']))
    <div class="main-wrapper home-three">
@elseif(Route::is(['index-6']))
        <div class="main-wrapper home-six">
    @elseif(Route::is(['index-8']))
            <div class="main-wrapper home-eight">
        @elseif(Route::is(['index-9']))
                <div class="main-wrapper home-nine">
            @elseif(Route::is(['index-11']))
                    <div class="main-wrapper home-eleven">
                @elseif(Route::is(['index-12']))
                        <div class="main-wrapper home-twelve">
                    @elseif(Route::is(['index-13']))
                            <div class="main-wrapper home-thirteen">
                        @elseif(Route::is(['index-14']))
                                <div class="main-wrapper home-dentist">
                            @elseif(Route::is(['index-14']))
                                    <div class="main-wrapper home-dentist">
                                @else
                                        <div class="main-wrapper">
                                    @endif