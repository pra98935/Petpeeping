<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$activity = array(
	'Moral indignation is jealousy with a halo. (H. G. Wells)',
	'Glory is fleeting, but obscurity is forever.(Napoleon Bonaparte)',
	'The fundamental cause of trouble in the world is that the stupid are cocksure while the intelligent are full of doubt. (Bertrand Russell)',
	'Victory goes to the player who makes the next-to-last mistake. (Chessmaster Savielly Grigorievitch Tartakower)',
	'His ignorance is encyclopedic (Abba Eban)',
	'If a man does his best, what else is there? (General George S. Patton)',
	'Political correctness is tyranny with manners. (Charlton Heston)',
	'You can avoid reality, but you cannot avoid the consequences of avoiding reality. (Ayn Rand)',
	'When one person suffers from a delusion it is called insanity; when many people suffer from a delusion it is called religion. (Robert Pirsig)',
	'Sex and religion are closer to each other than either might prefer. (Saint Thomas Moore)',
	'I can write better than anybody who can write faster, and I can write faster than anybody who can write better. (A. J. Liebling)',
	'People demand freedom of speech to make up for the freedom of thought which they avoid. (Soren Aabye Kierkegaard)',
	'Give me chastity and continence, but not yet. (Saint Augustine)',
	'Not everything that can be counted counts, and not everything that counts can be counted. (Albert Einstein)',
	'Only two things are infinite, the universe and human stupidity, and I\'m not sure about the former. (Albert Einstein)',
	'A lie gets halfway around the world before the truth has a chance to get its pants on. (Sir Winston Churchill)',
	'You may not be interested in war, but war is interested in you. (Leon Trotsky)',
	'I do not feel obliged to believe that the same God who has endowed us with sense, reason, and intellect has intended us to forgo their use. (Galileo Galilei)',
	'We are all atheists about most of the gods humanity has ever believed in.Some of us just go one god further. (Richard Dawkins)',
	'The artist is nothing without the gift, but the gift is nothing without work. (Emile Zola)',
	'The full use of your powers along lines of excellence. (definition of happiness by John F. Kennedy)',
	'I\'m living so far beyond my income that we may almost be said to be living apart. (E. E. Cummings)',
	'Give me a museum and I\'ll fill it. (Pablo Picasso)',
	'In theory, there is no difference between theory and practice. But in practice, there is. (Yogi Berra)',
	'I find that the harder I work, the more luck I seem to have. (Thomas Jefferson)',
	'Each problem that I solved became a rule which served afterwards to solve other problems. (Rene Descartes, Discours de la Methode)',
	'In the End, we will remember not the words of our enemies, but the silence of our friends. (Martin Luther King Jr.)',
	'Whether you think that you can, or that you can\'t, you are usually right. (Henry Ford)',
	'Do, or do not.There is no \'try\'. (Yoda)',
	'The only way to get rid of a temptation is to yield to it. (Oscar Wilde)',
	'Don\'t stay in bed, unless you can make money in bed. (George Burns)',
	'I don\'t know why we are here, but I\'m pretty sure that it is not in order to enjoy ourselves. (Ludwig Wittgenstein)',
	'There are no facts, only interpretations. (Friedrich Nietzsche)',
	'Nothing in the world is more dangerous than sincere ignorance and conscientious stupidity. (Martin Luther King Jr.)',
	'The use of COBOL cripples the mind; its teaching should, therefore, be regarded as a criminal offense. (Edsgar Dijkstra)',
	'C makes it easy to shoot yourself in the foot; C++ makes it harder, but when you do, it blows away your whole leg. (Bjarne Stroustrup)',
	'A mathematician is a device for turning coffee into theorems. (Paul Erdos)',
	'Problems worthy of attack prove their worth by fighting back. (Paul Erdos)',
	'Try to learn something about everything and everything about something. (Thomas Henry Huxley)',
	'Dancing is silent poetry. (Simonides)',
	'The only difference between me and a madman is that I\'m not mad. (Salvador Dali)',
	'If you can\'t get rid of the skeleton in your closet, you\'d best teach it to dance. (George Bernard Shaw)',
	'But at my back I always hear Time\'s winged chariot hurrying near. (Andrew Marvell)',
	'Good people do not need laws to tell them to act responsibly, while bad people will find a way around the laws. (Plato)',
	'The power of accurate observation is frequently called cynicism by those who don\'t have it. (George Bernard Shaw)',
	'Whenever I climb I am followed by a dog called \'Ego\'. (Friedrich Nietzsche)',
	'Everybody pities the weak; jealousy you have to earn. (Arnold Schwarzenegger)',
	'Against stupidity, the gods themselves contend in vain. (Friedrich von Schiller)',
	'We have art to save ourselves from the truth. (Friedrich Nietzsche)',
	'Never interrupt your enemy when he is making a mistake. (Napoleon Bonaparte)',
	'I think \'Hail to the Chief\' has a nice ring to it. (John F. Kennedywhen asked what is his favorite song)',
	'I have nothing to declare except my genius. (Oscar Wildeupon arriving at U.S. customs 1882)',
	'Human history becomes more and more a race between education and catastrophe. (H. G. Wells)',
	'Talent does what it can; genius does what it must. (Edward George Bulwer-Lytton)',
	'The difference between \'involvement\' and \'commitment\' is like an eggs-and-ham breakfast: the chicken was \'involved\' - the pig was \'committed\'. (unknown)',
	'Women might be able to fake orgasms. But men can fake a whole relationship. (Sharon Stone)',
	'If you are going through hell, keep going. (Sir Winston Churchill)',
	'He who has a \'why\' to live, can bear with almost any \'how\'. (Friedrich Nietzsche)',
	'Many wealthy people are little more than janitors of their possessions. (Frank Lloyd Wright)',
	'I\'m all in favor of keeping dangerous weapons out of the hands of fools.Let\'s start with typewriters. (Frank Lloyd Wright)',
	'Some cause happiness wherever they go; others, whenever they go. (Oscar Wilde)',
	'God is a comedian playing to an audience too afraid to laugh. (Voltaire)',
	'He is one of those people who would be enormously improved by death. (H. H. Munro (Saki))',
	'I am ready to meet my Maker. Whether my Maker is prepared for the great ordeal of meeting me is another matter. (Sir Winston Churchill)',
	'I shall not waste my days in trying to prolong them. (Ian L. Fleming)',
	'If you can count your money, you don\'t have a billion dollars. (J. Paul Getty)',
	'Facts are the enemy of truth. (Don Quixote - Man of La Mancha)',
	'When you do the common things in life in an uncommon way, you will command the attention of the world. (George Washington Carver)',
	'How wrong it is for a woman to expect the man to build the world she wants, rather than to create it herself. (Anais Nin)',
	'I have not failed. I\'ve just found 10,000 ways that won\'t work. (Thomas Alva Edison)',
	'I begin by taking.I shall find scholars later to demonstrate my perfect right. (Frederick (II) the Great)',
	'Maybe this world is another planet\'s Hell. (Aldous Huxley)',
	'Blessed is the man, who having nothing to say, abstains from giving wordy evidence of the fact. (George Eliot)',
	'Once you eliminate the impossible, whatever remains, no matter how improbable, must be the truth. (Sherlock Holmes (by Sir Arthur Conan Doyle, 1859-1930))',
	'Black holes are where God divided by zero. (Steven Wright)',
	'I\'ve had a wonderful time, but this wasn\'t it. (Groucho Marx)',
	'It\'s kind of fun to do the impossible. (Walt Disney)',
	'We didn\'t lose the game; we just ran out of time. (Vince Lombardi)',
	'The optimist proclaims that we live in the best of all possible worlds, and the pessimist fears this is true. (James Branch Cabell)',
	'A friendship founded on business is better than a business founded on friendship. (John D. Rockefeller)',
	'All are lunatics, but he who can analyze his delusion is called a philosopher. (Ambrose Bierce)',
	'You can only find truth with logic if you have already found truth without it. (Gilbert Keith Chesterton)',
	'An inconvenience is only an adventure wrongly considered; an adventure is an inconvenience rightly considered. (Gilbert Keith Chesterton)',
	'I have come to believe that the whole world is an enigma, a harmless enigma that is made terrible by our own mad attempt to interpret it as though it had an underlying truth. (Umberto Eco)',
	'Be nice to people on your way up because you meet them on your way down. (Jimmy Durante)',
	'The true measure of a man is how he treats someone who can do him absolutely no good. (Samuel Johnson)',
	'A people that values its privileges above its principles soon loses both. (Dwight D. Eisenhower , Inaugural Address, January 20, 1953)',
	'The significant problems we face cannot be solved at the same level of thinking we were at when we created them. (Albert Einstein)',
	'Basically, I no longer work for anything but the sensation I have while working. (Albert Giacometti (sculptor))',
	'There\'s a limit to how many times you can read how great you are and what an inspiration you are, but I\'m not there yet. (Randy Pausch)',
	'It is far better to grasp the Universe as it really is than to persist in delusion, however satisfying and reassuring. (Carl Sagan)',
	'All truth passes through three stages. First, it is ridiculed.Second, it is violently opposed. Third, it is accepted as beingself-evident. (Arthur Schopenhauer)',
	'Many a man\'s reputation would not know his character if they met onthe street. (Elbert Hubbard)',
	'There is more stupidity than hydrogen in the universe, and it has a longer shelf life. (Frank Zappa)',
	'Perfection is achieved, not when there is nothing more to add, but when there is nothing left to take away. (Antoine de Saint Exupery)',
	'Life is pleasant.Death is peaceful.It\'s the transition that\'s troublesome. (Isaac Asimov)',
	'If you want to make an apple pie from scratch, you must first create the universe. (Carl Sagan)',
	'It is much more comfortable to be mad and know it, than to be sane and have one\'s doubts. (G. B. Burgin)',
	'Once is happenstance. Twice is coincidence. Three times is enemy action. (Auric Goldfinger, in Goldfinger by Ian L. Fleming)',
	'To love oneself is the beginning of a lifelong romance (Oscar Wilde)',
	'http://vimeo.com/24724866',
	'http://vimeo.com/24723424',
	'http://vimeo.com/22694972',
	'http://vimeo.com/19658300',
	'http://vimeo.com/6282052',
	'http://www.youtube.com/watch?v=jiM6XIoW6ZY&feature=feedfbc',
	'http://www.youtube.com/watch?v=kh29_SERH0Y',
	'http://www.youtube.com/watch?v=t4CUNVYxxZM',
	'http://www.youtube.com/watch?v=51iquRYKPbs',
	'http://www.youtube.com/watch?v=1rjoQ-knMGU',
	'http://www.youtube.com/watch?v=yoy4_h7Pb3M',
	'http://www.youtube.com/watch?v=wGwyf1t0OCU',
	'http://www.youtube.com/watch?v=WhBoR_tgXCI',
	'http://www.youtube.com/watch?v=-58oLEKnpYE',
	'http://www.youtube.com/watch?v=Ac0miuyXV4Q',
	'WordPress is web software you can use to create a beautiful website or blog. We like to say that WordPress is both free and priceless at the same time.',
	'BuddyPress is completely free and open source. Unlike hosted services, BuddyPress allows you to stay in control of your site and create a totally customized, unique experience.',
	'http://vimeo.com/28926706',
);
