<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="psIJFIiZLJ88RxE0IlQFJ-ves9YdfCPVdnvjfMxSEI0" />
        <link rel="canonical" href="https://gobid.se" />
        

        <title>GoBid</title>
        <link rel="stylesheet" href="{{ mix('css/landing.css') }}">
    </head>
    <body>

        <header class="landing-header">
            <div class="container">
                <nav>
                    <div class="logo-container">
                        <img src="{{ asset('images/logo.png') }}" alt="GoBid.se logo">
                    </div>
                    <div class="actions-container">
                        <button type="button" class="btn btn-primary" id="createButton">Skapa en tjänst</button>
                    </div>
                </nav>
            </div>
        </header>

        <main>

            <div class="landing-hero" style="padding-top: 100px;">
                <div class="container">
                    <h2>Ska du flytta och behöver hjälp?<br>Få företag att buda på att få hjälpa dig.</h2>
                    <h4>
                        <p>Vill du spara tid och energi på att hitta rätt företag att hjälpa dig med flytten? Lägg ut din tjänst på GoBid.se och luta dig tillbaka och låt företagen komma till dig.</p>
                        <p style="margin-top: 20px;">Efter buden har trillat in tar du hjälp av vårt omdömessystem och verifierade företag för att bestämma vem du vill jobba med.</p>
                        <p style="margin-top: 20px;">Snabbt, enkelt och gratis.</p>
                    </h4>

                    <div class="video-container">
                        <img src="{{ asset('images/screen-video.png') }}" alt="">
                    </div>
                </div>
            </div>

            <section class="home-handle-service-steps-outer create-service" style="margin-top: 40px;">
                <div class="container">
                    <div class="handle-service-steps-heading-container">
                        <span>Hur fungerar det?</span>
                    </div>
        
                    <div class="handle-service-steps-container">
                        <div class="handle-service-step">
                            <div class="handle-service-step-icon icon-create-service"></div>
                            <h4 class="handle-service-step-heading">Skapa din tjänst</h4>
                            <div class="handle-service-step-content">
                                Beskriv tjänsten som du vill få utförd. Lägg till bilder, ritningar eller annan media. Berätta 
                                när du vill att tjänsten ska påbörjas och när den ska vara färdig.
                            </div>
                        </div>
        
                        <div class="handle-service-step">
                            <div class="handle-service-step-icon icon-get-bids"></div>
                            <h4 class="handle-service-step-heading">Få bud på att utföra tjänsten</h4>
                            <div class="handle-service-step-content">
                                Ta emot bud från företag på att få utföra din tjänst. Istället för att du ska ringa runt och 
                                samla in offerter så låter du offerterna komma till dig. 
                            </div>
                        </div>
        
                        <div class="handle-service-step">
                            <div class="handle-service-step-icon icon-choose-service"></div>
                            <h4 class="handle-service-step-heading">Välj det budet som passar dig</h4>
                            <div class="handle-service-step-content">
                                När budgivningen är färdig är det dags för dig att välja vem du vill ska få utföra tjänsten. 
                                Ta hjälp av vårt omdömessystem för att hitta rätt. Du har kontrollen själv.
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="landing-section bg-dark">
                <div class="container">
                    <div class="landing-heading text-white">
                        <span>Vanliga frågor &amp; svar</span>
                    </div>

                    <div class="q-a-container">
                        <div class="q-a">
                            <div class="q-a-icon"><i class="icon h_help wh20 primary"></i></div>
                            <div class="q-a-text">
                                <div class="question">Hur mycket kostar det?</div>
                                <div class="answer">
                                    Att lägga ut en tjänst på GoBid är helt gratis. När ett företag får utföra tjänsten så tar GoBid en liten hittelön. Det är så plattformen tjänar pengar.
                                </div>
                            </div>
                        </div>

                        <div class="q-a">
                            <div class="q-a-icon"><i class="icon h_help wh20 primary"></i></div>
                            <div class="q-a-text">
                                <div class="question">Måste jag välja det billigaste budet?</div>
                                <div class="answer">
                                    Nejdå. Du har helt och hållet själv kontrollen över vilket företag du vill jobba med. Ta hjälp av vårt omdömessystem för att hitta rätt. När du har accepterat ett bud
                                    så har du 14 dagar på dig att acceptera projektets start. Här är ett ypperligt tillfälle att träffa företaget först innan ni börjar projektet.
                                </div>
                            </div>
                        </div>

                        <div class="q-a">
                            <div class="q-a-icon"><i class="icon h_help wh20 primary"></i></div>
                            <div class="q-a-text">
                                <div class="question">Hur vet jag att det är ett seriöst företag?</div>
                                <div class="answer">
                                    Vi kontrollerar alla företag som registrerar sig på plattformen för att sålla bort dem oseriösa aktörerna. Men det viktigaste är att du kollar igenom omdeömena som företaget har
                                    fått. Alla omdömmen är autentiska och där är ett projekt bakom varje. Viktigt är också att du känner tryggheten i dem 14 dagar du har på dig att acceptera projektets start.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="landing-section bg-light-gray">
                <div class="container">
                    <div class="landing-heading text-dark" id="registerHeading">
                        <span>Redo att skapa en tjänst?</span>
                    </div>

                    <div class="landing-section-help">
                        <div class="q-a" style="margin-bottom: 0;">
                            <div class="q-a-icon"><i class="icon h_help wh20 primary"></i></div>
                            <div class="q-a-text">
                                <div class="question">Varför måste jag registrera?</div>
                                <div class="answer">
                                    <p>Efter du har hittat ett företag som du vill jobba med så kommer ni att starta ett projekt. Därför behövs en inloggning för
                                    att kunna hålla reda på dina projekt. Detta gör också att du kan redigera din tjänst och att vi kan skicka notifikationer till dig
                                    om vad som händer med din tjänst.</p>
                                    <p>Att registrera dig tar ca 30 sekunder och direkt efter kan du skapa den tjänst som du vill ha hjälp med.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-container">
                        <form method="POST" action="{{ route('auth.register', ['#register']) }}" id="register">
                            {{ csrf_field() }}
                            <input type="hidden" name="company" value="0">
                            
                            <div class="control-container {{ $errors->has('username') ? 'has-errors' : '' }}">
                                <label for="username" class="control-label">Användarnamn</label>
                                <input type="text" name="username" class="form-control" placeholder="Välj användarnamn">
                                @if ( $errors->has('username'))
                                    <span class="help-block">{{ $errors->first('username') }}</span>
                                @endif
                            </div>

                            <div class="control-container {{ $errors->has('email') ? 'has-errors' : '' }}">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Din emailadress">
                                @if ( $errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="control-container {{ $errors->has('password') ? 'has-errors' : '' }}">
                                <label for="password" class="control-label">Lösenord</label>
                                <input type="password" name="password" class="form-control" placeholder="Skapa lösenord">
                                @if ( $errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                                <span class="help-block gray-sub-text">Minst en bokstav, ett nummer, och 7 tecken.</span>
                            </div>

                            <button type="submit" class="btn btn-primary full-width">Registrera</button>
                        </form>
                    </div>
                    
                </div>
            </section>

        </main>

        <script>
            var createButton = document.getElementById('createButton');
            createButton.addEventListener('click', function(event) {
                var registerForm = document.getElementById('registerHeading');
                var rect = registerForm.getBoundingClientRect();
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                window.scrollTo({
                    top: rect.top + scrollTop - 80,
                    behavior: "smooth"
                });
            });
        </script>
    </body>
</html>