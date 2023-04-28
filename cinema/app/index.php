<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Badr Agrad, Naim Chefirat, Boubakar Mesbahi">
    <meta name="description" content="projet programmation web site de cinema">
    <script src="https://kit.fontawesome.com/927b94a7cf.js" crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="style/style1.css">
    
    <title>Cinema BCB</title>
</head>
<body>
<script src="/include/main.js"></script>
     
    <?php include_once 'include/header.php'; ?>
    
    <script> //script pour la navbar qui devient opaque 
        let header = document.querySelector('header');

        window.addEventListener('scroll', () => {
        header.classList.toggle('shadow', window.scrollY > 0);
        }); 
    </script>   



    <section class="menu swiper" id="menu">
        <div class="swiper-wrapper">
            <div class="swiper-slide conatiner">
                <img src="images/spiderman1.jpeg" alt="spiderman">
                <div class="menu-text">
                    <span>Marvel Cinematic Universe</span>
                    <h1>Spiderman</h1>
                    <a href="ordermovie.php?movie=19"><button class="btn">Séances</button></a>
                </div>
            </div>

            <div class="swiper-slide conatiner">
                <img src="images/Anneaux.jpg" alt="seigneur des anneaux">
                <div class="menu-text">
                    <span>Le Seigneur des Anneaux</span>
                    <h1>Le Seigneur des anneaux <br> le marathon évènement</h1>
                    <a href="ordermovie.php?movie=3"> <button class="btn">Séances</button></a>
                </div>
            </div>


            <div class="swiper-slide conatiner">
                <img src="images/ghibli.jpeg" alt="studio ghibli">
                <div class="menu-text">
                    <span>Studio Ghibli</span>
                    <h1>Revivez les films de Miyazaki</h1>
                    <a href="ordermovie.php?movie=10"><button class="btn">Séances</button></a>
                </div>
            </div>
            
        </div>
          
          <div class="swiper-pagination"></div>
    </section>

    <section class="films" id="films">
        
        <h2 class="titre">NOUVEAUTÉS</h2>
        
            <div class="film-container">

                <div class="box">
                    <div class="box-img">
                        <a href="ordermovie.php?movie=16"><img src="images/films/endgame.jpeg" alt="endgame"></a>
                    </div>
                    <h3>Avengers : Endgame</h3>
                    <span>3h 01 min | Action, Fantastique, Aventure</span>
                </div>

                <div class="box">
                    <div class="box-img">
                        <a href="ordermovie.php?movie=7"><img src="images/films/inception.jpeg" alt="inception"></a>
                    </div>
                    <h3>Inception</h3>
                    <span>2h 28 min | Science-fiction, Thriller</span>
                </div>

                <div class="box">
                    <div class="box-img">
                        <a href="ordermovie.php?movie=12"><img src="images/films/trésor.jpeg" alt="tresor"></a>
                    </div>
                    <h3>La planète au trésor</h3>
                    <span>1h 35 min | Animation, Science fiction, Aventure</span>
                </div>

                <div class="box">
                    <div class="box-img">
                        <a href="ordermovie.php?movie=20"><img src="images/films/jumper.jpeg" alt="jumper"></a>
                    </div>
                    <h3>Jumper</h3>
                    <span>1h 35 min | Aventure, Science fiction, Thriller</span>
                </div>

                <div class="box">
                    <div class="box-img">
                        <a href="ordermovie.php?movie=11"><img src="images/films/arrietty.jpeg" alt="arrietty"></a>
                    </div>
                    <h3>Arrietty le petit monde des chapardeurs</h3>
                    <span>1h 34 min | Animation, Fantastique, Aventure</span>
                </div>

                <div class="box">
                    <div class="box-img">
                        <a href="ordermovie.php?movie=19"><img src="images/films/spiderman.jpeg" alt="spiderman"></a>
                    </div>
                    <h3>Spider-man</h3>
                    <span>2h 01 min | Action, Fantastique</span>
                </div>
            </div>
            <br>
            
        <h2 class="titre">A L'AFFICHE</h2>
        
        <div class="film-container">

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=3"><img src="images/films/seigneur1.jpeg" alt="seigneur1"></a>
                </div>
                <h3>Le Seigneur des anneaux : la Communauté de l'anneau</h3>
                <span>2h 58 min | Fantastique, Aventure</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=2"><img src="images/films/seigneur2.jpeg" alt="seigneur2"></a>
                </div>
                <h3>Le Seigneur des anneaux : Les Deux Tours</h3>
                <span>2h 59 min | Fantastique, Aventure</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=1"><img src="images/films/seigneur3.jpeg" alt="seigneur3"></a>
                </div>
                <h3>Le Seigneur des anneaux : Le Retour du roi</h3>
                <span>3h 30 min | Fantastique, Aventure</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=6"><img src="images/films/hobbit1.jpeg" alt="hobbit1"></a>
                </div>
                <h3>Le Hobbit : Un voyage inattendu</h3>
                <span>2h 49 min | Fantastique, Aventure</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=5"><img src="images/films/hobbit2.jpeg" alt="hobbit2"></a>
                </div>
                <h3>Le Hobbit : La désolation de Smaug</h3>
                <span>2h 41 min | Fantastique, Aventure</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=4"><img src="images/films/hobbit3.webp" alt="hobbit3"></a>
                </div>
                <h3>Le Hobbit : la bataille des cinq armées</h3>
                <span>2h 24 min | Fantastique, Aventure</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=15"><img src="images/films/avengers.jpeg" alt="avengers"></a>
                </div>
                <h3>Avengers</h3>
                <span>2h 23 min | Action, Aventure, Science fiction</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=17"><img src="images/films/infinity.jpeg" alt="infinity"></a>
                </div>
                <h3>Avengers : Infinity War</h3>
                <span>2h 29 min | Action, Fantastique, Aventure</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=18"><img src="images/films/ironman.png" alt="inronman"></a>
                </div>
                <h3>Iron Man</h3>
                <span>2h 06 min | Action, Science fiction</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=14"><img src="images/films/blood.jpeg" alt="blood"></a>
                </div>
                <h3>Blood Diamond</h3>
                <span>2h 23 min | Aventure, Drame, Thriller</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=9"><img src="images/films/momonoké.jpeg" alt="momonoké"></a>
                </div>
                <h3>Princesse Momonoké</h3>
                <span>2h 13 min | Drame, Animation</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=10"><img src="images/films/chihiro.jpeg" alt="chihiro"></a>
                </div>
                <h3>Le Voyage de Chihiro</h3>
                <span>2h 05min | Animation, Aventure</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=8"><img src="images/films/coucou.jpeg" alt="coucou"></a>
                </div>
                <h3>Vol au-dessus d'un nid de coucou</h3>
                <span>2h 13 min | Drame</span>
            </div>

            <div class="box">
                <div class="box-img">
                    <a href="ordermovie.php?movie=13"><img src="images/films/kuzco.jpeg" alt="kuzco"></a>
                </div>
                <h3>Kuzco : L'empereur mégalo</h3>
                <span>2h 28 min | Animation, Aventure, Comédie</span>
            </div>
        </div>
    </section>

    <section class="liste-cinema" >
        <div class="cinema" id="cinema">
        
            <h2 class="titre">CINEMAS</h2>

            <div class="search-container">
                <input class="searchbar" id="searchbar" onkeyup="search_cinema()" type="text" name="search" placeholder="Rechercher votre Cinéma..">
                
            </div>
            
            <div class="salle">
                <div class="cinema-info">
                    <img src="https://www.defense-92.fr/wp-content/uploads/2020/12/colline-de-la-defense-dome-imax-.jpg">
                    <br>
                    <div class="cinema-name">
                        <h3><a href="cinema.php?cine=1">Cinéma Cité La Défense</a> </h3><br>
                        <span>Centre Commercial Les Quatre Temps</span><br>
                        <span>92092 PARIS-LA-DEFENSE</span>
                    </div>
                </div>
            </div>
            <br><br>
            

            <!-- 2 -->
            <div class="salle">
                <div class="cinema-info">
                <img  src="https://www.boxofficepro.fr/wp-content/uploads/sites/2/2022/09/IMG_5451-1024x683.jpg">
                <br>
                <div class="cinema-name">
                    <h3><a href="cinema.php?cine=2">Cinéma Issy-Les-Moulineaux</a></h3><br>
                    <span>8 Promenade Cœur de Ville</span><br>
                    <span>92130 Issy-les-Moulineaux</span>
                </div>
            </div>
                
            </div>
                <br><br>
                
                
                
                
                <!-- 3 -->
            <div class="salle">
                <div class="cinema-info">
                <img src="https://medias.businessimmo.com/default/0002/41/140497/ugc-rosny-2_admin.jpg">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=3">Cinéma Cité Rosny</a></h3><br>  
                <span>Centre Commercial Rosny 2 - 16, rue Conrad Adenauer</span><br> 
                <span>93110, ROSNY SOUS BOIS</span> 
                </div> 
                </div>
            </div>
                <br><br>
                


                <!-- 4 -->
            <div class="salle">
                <div class="cinema-info">
                <img  src="http://idata.over-blog.com/2/65/16/29/2013NOVEMBRE/ugc-aulnay-parinor.jpg">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=4">Cinéma Cité O'Parinor</a></h3><br>
                <span>Centre Commercial O Parinor Le Haut de Galy</span><br>
                <span>93600 AULNAY SOUS BOIS</span>
            </div>
            </div>
            </div>
                <br><br>
                

                
                
                <!-- 5 -->
            <div class="salle">
                <div class="cinema-info">
                <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/12/24/51/a3/ugc-cine-cite.jpg?w=1200&h=-1&s=1">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=5">Cinéma Cité Créteil</a></h3><br>
                <span>Centre Commercial Créteil Soleil</span><br>
                <span>94000 CRETEIL</span> 
                </div>
            </div>
            </div>	
                <br><br>
                

                
                <!-- 6 -->
            <div class="salle">
                <div class="cinema-info">
                <img  src="https://cst.fr/wp-content/uploads/2020/03/CINEMA_CGR_EXTE-1.jpg">
                <br><div class="cinema-name">
                <h3><a href="cinema.php?cine=6">Cinéma Nanterre Coeur Université</a></h3><br>
                <span>200 allée de Corse</span><br>
                <span>92000 Nanterre </span>
            </div>
             </div>
            </div>
                <br><br>
                

                
                
                <!-- 7 -->
            <div class="salle">
                <div class="cinema-info">
                <img src="https://cdn-s-www.leprogres.fr/images/BB0D792A-2730-416C-B266-0A0101100B27/NW_raw/des-son-ouverture-le-mega-cgr-a-tape-fort-avec-15-salles-et-autant-de-films-a-l-affiche-photo-damien-lepetitgaland-1454705637.jpg">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=7">Cinéma Brignais</a></h3><br>
                <span>1 Rue de L'industrie / ZI Les Valliers</span><br>
                <span>69530 Brignais</span> 
            </div>
            </div>
            </div>
                
                <br><br>
                

                
                
                <!-- 8 -->
                
            <div class="salle">
                <div class="cinema-info">
                <img src="https://fr.web.img1.acsta.net/pictures/214/584/21458465_214533059.jpg/r_1472_939">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=8">Cinéma Epinay-sur-Seine</a></h3><br>
                <span>5, avenue Joffre</span><br>
                <span>93800 Épinay-sur-Seine</span> 
            </div>
            </div>
            </div>    
                <br><br>
                

                
                
                <!-- 9 -->
            <div class="salle">
                <div class="cinema-info">
                <img src="https://fr.web.img1.acsta.net/img/26/b1/26b171c3c8b44c793c49f90ee1123893.jpg/r_1472_983">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=9">Cinéma Paris - Lilas</a></h3><br>
                <span>Place du Maquis du Vercors</span><br>
                <span>75020 Paris</span>
                </div>
                </div>
            </div>
                
                <br><br>
                

                
                
                <!-- 10 -->
            <div class="salle">
                <div class="cinema-info">
                <img  src="https://www.boxofficepro.fr/wp-content/uploads/sites/2/2021/02/Photo-17-10-2017-17-10-05-scaled.jpg">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=10">Cinéma Sarcelles My Place</a></h3><br>
                <span>2, contre-allée Henri Dunant</span><br>
                <span>95200, Sarcelles</span></div>
            </div>
                    
            </div>
                <br><br>
                

                
                
                <!-- 11 -->
            <div class="salle">
                <div class="cinema-info">
                <img  src="https://img.annuaire-mairie.fr/img/logo/gaumont-saint-denis.jpg">
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=11">Cinéma Stade de France</a></h3><br>
                <span>8, rue du Mondial 98</span><br>
                <span> 93210 Saint-Denis</span> </div>
                </div>
                    
            </div>
                <br><br>
                

                
                <!-- 12 -->
            <div class="salle">
                <div class="cinema-info">
                <img src="https://3.bp.blogspot.com/-cEjCiic3L50/Wo2Hr806k2I/AAAAAAABRYw/aX_z4XGnrkwhNXtyBSX1oDwU5ZHm1aW5gCLcBGAs/s1600/Gaumont-Al%25C3%25A9sia.jpg">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=12">Cinéma Alésia</a></h3><br>
                <span>73 avenue du Général Leclerc 75014</span><br>
                <span>Paris 14e arrondissement</span></div></div>
            </div>

                <br><br>
                
                
                <!-- 13 -->
            <div class="salle">
                <div class="cinema-info">
                <img src="https://salles-cinema.com/wp-content/uploads/2009/08/gaumont-aquaboulevard.jpg">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=13">Cinéma Aqualouevard</a></h3><br>
                <span>8-16, rue du Colonel-Pierre-Avia </span><br> 
                <span>75015 Paris 13e arrondissement</span></div>  </div>      
            </div>
                
                <br><br>
                

                
                    
                <!-- 14 -->
            <div class="salle">
                <div class="cinema-info">
                <img src="https://salles-cinema.com/wp-content/uploads/2016/04/cinema-gaumont-convention_01.jpg">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=14">Cinéma Convention</a></h3><br>
                <span>27, rue Alain-Chartier</span><br>
                <span>75015 Paris</span></div>   </div>
            </div>
            <br><br>
                


            <!-- 15 -->
            <div class="salle">
                
                <div class="cinema-info">
                <img src="https://www.ville-saran.fr/sites/default/files/documents/culture/cinema.jpg">
                <br>
                <div class="cinema-name">
                <h3><a href="cinema.php?cine=15">Cinéma Saron - IMAX</a></h3><br>
                <span>Rond Point Tangentielle / RN 20 Nord</span><br> 
                <span>SARAN 45770 Saran</span></div>  </div> 
            </div>
                <br><br>
        </div>
    </section>

    <?php include_once 'include/copyright.php'; ?>


    <!-- script pour le menu défilant -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".menu", {
          spaceBetween: 30,
          centeredSlides: true,
          autoplay: {
            delay: 2500,
            disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
      </script>
 
</body>

</html>