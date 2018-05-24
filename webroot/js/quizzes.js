$(document).ready(function() {
	
    var keys = [];

    for (var i = 0; i < questions.length; i++) {
        var numQuestion = i + 1;
        var a = '<div class="choices" data-choices=' + "'" + questions[i]['reponses'] + "'" + '>';
        $('<p class="quest" id="' + numQuestion + '"><small>Question ' + numQuestion + '/' + questions.length + '<br/></small>' + questions[i]['intitule'] + '</p>').appendTo('#question').hide();
        $('<section data-quiz-item class="propositions">' + a + '</div></section>').appendTo('.quiz>div').hide();
        keys.push(questions[i]['bonneReponse']);
    }

    $('p').first().show();
    $('.propositions').first().show();
    $(document).emc({
        keys
    });
	
	$('#encore').click(function(){
		location.reload();
	});
	
});

(function($) {
    $.fn.emc = function(options) {

        var defaults = {
            key: [],
            scoring: "normal",
        }

        settings = $.extend(defaults, options),
            $quizItems = $('[data-quiz-item]'),
            $choices = $('[data-choices]'),
            itemCount = $quizItems.length,
            chosen = [],
            $option = null,
            $label = null;

        var compteur = 0;
        var keys = [];
        var erreur = 0;
        var truc = 0;
        
        for (var i = 0; i < questions.length; i++) {
            keys.push(questions[i]['bonneReponse']);
        }


        emcInit();

        function emcInit() {
            $quizItems.each(
                function(index, value) {
                    var $this = $(this),
                        $choiceEl = $this.find('.choices'),
                        choices = $choiceEl.data('choices');

                    for (var i = 0; i < choices.length; i++) {

                        $option = $('<input name="' + index + '" id="' + index + '_' + i + '" type="radio">');
                        $label = $('<label for="' + index + '_' + i + '">' + choices[i] + '</label>');
                        $choiceEl.append($option).append($label);

                        $option.on('change', function() {
                            return getChosen(this);
                        });
                    }

                });
        }

        function removePop() {
            $indication = $('#emc-indication');
            $indication.removeClass('new-indication');
        }

        function getChosen(choix) {
            chosen = [];
            if (chosen[compteur] != keys[compteur]) {
                erreur = erreur + 1;
            }
            $indication = $('.boutons');
            $choices.each(
                function() {
                    var $inputs = $(this).find('input[type="radio"]');
                    $inputs.each(
                        function(index, value) {

                            if ($(this).is(':checked')) {
                                chosen.push(index + 1);

                                if (chosen[compteur] != keys[compteur]) {
                                    $(this).next().css('background-color', '#E50003');
                                    $(this).next().css('color', 'white');
                                    $(this).next().css('border-color', '#E50003');
                                    $('p').remove('.indic');
                                    $indication.prepend('<p class="indic">C\'est une mauvaise réponse...</p>');
                                    $indication.addClass('new-indication');
                                    

                                } else {
                                    $(this).next().css('background-color', '#8ABF00');
                                    $(this).next().css('color', 'white');
                                    $(this).next().css('border-color', '#8ABF00');
                                    $('p').remove('.indic');
                                    $indication.prepend('<p class="indic">C\'est une bonne réponse !</p>');
                                    $indication.addClass('new-indication');
                                    erreur = erreur - 1;
                                }
                                console.log(erreur);
                                $(this).nextAll().css('cursor', 'default');
                                $(this).nextAll().off();
                                $(this).prevAll().css('cursor', 'default');
                                $(this).prevAll().off();

                            }
                        });
                });
            getProgress(choix);
        }



        function scoreNormal(index) {
            var score = null;
            $scoreEl = $('#emc-score');
            $btnA = $('#emc-btn-again');
            $btnC = $('#emc-btn-continue');
            
            
            if (chosen.length === itemCount) {
                var badresp = erreur;
                var goodresp = itemCount - badresp;
                score = (goodresp / itemCount) * 100;
                
               
               
                if (score < 50) {
                    truc=truc+1;
                    $scoreEl.addClass('new-score');
                    if (truc==1){
                    $('<section id="fini"><div><p>Dommage !</p><p>Vous avez obtenu un score de </p><div class="pourcent"><p>'+ score + ' %</p></div><p class="truc">Ce n\'est pas suffisant. Vous devez refaire le quizz !</p></div><div id="barreBas"></div></section>').appendTo($scoreEl);
                      
                    }
                    $btnA.addClass('new-btn');
                    $('#barreBas').append($btnA);
                    $('#emc-submit').remove();
                    $('#boutons').remove();
                    
                } else {
                    truc=truc+1;
                    $scoreEl.addClass('new-score');
                    if (truc==1){
                    $('<section id="fini"><div><p>Bravo !</p><p>Vous avez obtenu un score de </p><div class="pourcent"><p>'+ score + ' %</p></div><p class="truc">Continuez comme ça !</p></div><div id="barreBas"></div></section>').appendTo($scoreEl);
                    
                    }
                    $btnC.addClass('new-btn');
                    $('#barreBas').append($btnC);
                    $('#emc-submit').remove();
                    $('#boutons').remove();
                    
                    /* IL AAAAA REUSSIIIIIIIIII*/
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                }
                $('html,body').animate({
                    scrollTop: 0
                }, 50);

            }

        }

        function getProgress(choix) {
			
            var prog = (chosen.length / itemCount) * 100 + "%",
                $submit = $('#emc-submit');
            
            $submit.click(
			
                compteur = compteur + 1,

                function() {
					
                    var index = $(choix).parent().parent().hide().next().show().index();
                    var id = '#' + (index + 1);

                    console.log(id);
                    $('.quest').hide();
                    $(id).show();
                    return scoreNormal(index);
                });
        }
    }
}(jQuery));

