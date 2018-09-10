# AppCrowdFunding
# https://societyoffunding.000webhostapp.com/AppCrowdFunding/


# Definizione del problema

Il progetto ha come scopo la creazione di un’applicazione web che permetta il crowdfunding, ossia una pratica di microfinanziamento dal basso che mobilita persone e risorse. La piattaforma offre un servizio a:
- Organizzazioni o singole persone che vogliono realizzare un progetto o un’idea ma non hanno disponibilità economica
- Organizzazioni o singole persone che vogliono promuovere idee, start-up o cause sociali

“Il crowdfunding o finanziamento collettivo in italiano è un processo collaborativo di un gruppo di persone che utilizza il proprio denaro in comune per sostenere gli sforzi di persone e organizzazioni. È una pratica di microfinanziamento dal basso che mobilita persone e risorse.

 
# Opportunità di business e posizionamento del prodotto
 
L’applicazione web propone due tipi di finanziamento:

- Reward Crowdfunding ossia finanziamento collettivo per ricompensa, che prevede per l’investitore una ricompensa commisurata con il contributo.
- Donation Crowdfunding ossia finanziamento collettivo per donazioni,  che prevede che i sostenitori di un progetto contribuiscono al medesimo finanziandolo senza aspettarsi un beneficio tangibile dalla donazione.
La piattaforma adotta uno schema All-or-nothing (tutto o niente); prevede infatti che solo al raggiungimento dell’obiettivo di raccolta prefissato dal progettista, i fondi vengano trasferiti al progettista e la relativa percentuale (success fee) venga corrisposta alla piattaforma.
Gli utenti (singoli individui, aziende o enti), hanno la possibilità di ricevere copertura finanziaria per progetti che altrimenti avrebbero difficoltà nel reperire risorse.
 
# Utenti del sistema

- Utente non registrato: può visualizzare le campagne, può visitare i profili ma non può effettuare donazioni o pubblicare delle campagne.
- Utente  registrato: può essere un individuo, un’azienda o un ente pubblico. L’utente registrato, oltre alle funzionalità dell’utente non registrato, crea un proprio profilo, può effettuare delle donazioni e richiedere la pubblicazione di campagne

# Elenco delle funzionalità

Segue un elenco di funzionalità che la piattaforma prevede:

### Creazione e cancellazione di una campagna (Fabrizio)
#### Utenti coinvolti: utenti registrati
Tale funzionalità permette di creare una campagna, dargli un titolo, aggiungere una descrizione, una data di scadenza, fissare un obiettivo (in termini monetari) e aggiungere da una a cinque foto; nonché di eliminarla.

### Navigazione Top 5 delle campagne (Fabrizio)
#### Utenti coinvolti: utenti registrati e non registrati
Tale funzionalità permette di visualizzare la top 5 delle campagne divise per categoria (Tecnologia, Arte, Beneficenza, Musica, Cibo, Moda, Film & Video), nonché le ultime campagne inserite, quelle in scadenza e le top del giorno.

### Registrazione di un utente (Fabrizio)
#### Utenti coinvolti: utenti non registrati
Tale funzionalità permette all’utente non registrato di creare il proprio profilo sulla piattaforma. La creazione del profilo prevede l’inserimento di dati quali, nome, cognome, username, indirizzo di residenza, data di nascita, immagine del profilo e password. Al momento della registrazione viene inviato tramite mail un codice di sicurezza. Quando si effettua il login viene richiesto tale codice.

### Effettuare il login (Fabrizio)
#### Utenti coinvolti: utenti registrati e non ancora loggati
Tale funzionalità permette di autenticarsi sulla piattaforma e quindi, permette all’utente di poter creare campagne o effettuare donazioni. Prevede l’aggiunta del Remind Me, opzione che, se abilitata, evita all’utente di reinserire i propri dati al successivo accesso.

### Profilo Utente (Fabrizio)
#### Utenti coinvolti: utenti registrati e non registrati
Tale funzionalità permette di visitare il profilo di un utente registrato mostrando alcune informazioni come: indirizzo email, username, immagine del profilo, nome, cognome, descrizione, indirizzo, le campagne pubblicate dall’utente, le donazioni effettuate.

### Modifica profilo (Fabrizio) 
#### Utenti coinvolti: utenti registrati e loggati
Tale funzionalità consente ad un utente di modificare le proprie informazioni, la propria immagine del profilo nonché di eliminare il proprio account.
 
### Effettuare una donazione (Serena)
#### Utenti coinvolti: utenti registrati e loggati
Tale funzionalità permette di effettuare la donazione di una campagna che non è ancora scaduta e che non ha raggiunto l’obiettivo fissato. Prevede l’inserimento di una carta di credito e della quantità di denaro da donare. Nel caso in cui la campagna che si vuole supportare preveda una o più reward e la somma donata sia sufficiente, l’utente riceve la reward. In caso di più reward, riceve la reward più alta.

### Ricerca (Oscar)
#### Utenti coinvolti: utenti non registrati/utenti registrati
La funzionalità di ricerca base, permette di cercare all’interno del sito le campagne rispetto alla categoria e nome, e una ricerca degli utenti rispetto all'username.

### Aggiungere e rimuovere reward (Fabrizio)
#### Utenti coinvolti: utenti registrati, loggati, che abbiano creato una campagna
La funzionalità di aggiunta reward permette l’aggiunta e la rimozione di reward, associate a una campagna. L’aggiunta di reward prevede l’inserimento di un titolo, una descrizione e una donazione minima affinché possa essere assegnata la reward.

### Ricerca avanzata (Oscar)
#### Utenti coinvolti: utenti registrati e loggati
La funzionalità di ricerca avanzata fornisce una ricerca delle campagne per categoria, per nome, per country o per founder e una ricerca degli utenti tramite username. 

### Effettuare e rimuovere commenti (Fabrizio)
#### Utenti coinvolti: utenti registrati e loggati
La funzionalità di aggiunta commenti a una determinata campagna, prevede l’inserimento del testo relativo agli stessi. La rimozione consente all’utente che ha fatto quel commento di rimuoverlo.

### Navigazione nelle info (Serena)
#### Utenti coinvolti: utenti registrati e non
La funzionalità permette di poter navigare nelle informazioni del sito e poter visitare le varie sezioni quali “Chi siamo”, “Perché sceglierci” e “Contatti”.

## Guida all'installazione

Per l'installazione dell'applicazione sono necessari i seguenti requisiti:
- aver installato XAMPP sul proprio dispositivo;
- versione di PHP 7.0.0 o superiore;
- cookie abilitati sul proprio browser;
- JavaScript abilitati.

A questo punto è sufficiente porre la cartella dell'applicativo all'interno di ''' /xampp/htdocs '''' e lanciare, mediante il proprio browser,l'URL ''' localhost/AppCrowdFunding '''. Al primo avvio dell'applicazione bisognerà compilare un form per la creazione del database inserendo:
- nome del database;
- nome utente;
- password.
In più è possibile scegliere, mediante apposita checkbox, se popolare o meno il database.

### Scelte progettuali 

#### La logica

Per la progettazione e realizzazione dell’applicativo, il team, si è basato su un’architettura di tipo MVC (Model-view-controller), facendo riferimento a classi indipendenti. 
La logica, prevede la suddivisione di Model, View e Controller non solo dal punto di vista concettuale. Infatti, le varie componenti vengono codificate su file distinti. Tale scelta fa sì che il codice sia riutilizzabile. 
In particolare si noti che, per ogni classe entity, è stata creata una classe foundation responsabile di inviare al db le relative query. Le classi foundation possono avere metodi specifici ma in genere condividono i metodi relativi alle operazioni CRUD (Create, Read, Update, Delete). E’ stato utilizzato un approccio su pattern singleton, vale a dire viene garantita un'unica istanza della classe all'interno del programma. 

#### Il linguaggio

Il linguaggio server-side, usato, è PHP. La scelta deriva dal fatto che è opensource, portabile, ha alte prestazioni, facile da utilizzare (la sua sintassi deriva dal C), ha potenzialità vastissime e si può connettere a una vasta gamma di db.
In particolare  per l'accesso a MySql tramite PHP è stato utilizzato PDO, un livello di astrazione specifico per le applicazioni PHP molto utile perché non dipende dal server database utilizzato. Lo svantaggio è che non si può utilizzare nelle versioni più vecchie di MySQL.
Lato client, è stato utilizzato anche Javascript un linguaggio di scripting orientato agli oggetti e agli eventi, in gradi di creare di effetti dinamici interattivi tramite funzioni di script invocate da eventi innescati a loro volta, in vari modi, dall'utente sulla pagina web in uso. In particolare è stato usato nel controllo delle form della registrazione, donazione, login e creazione della campagna, per effettuare controlli server-side. E’ stato usato, inoltre, per la visualizzazione del messaggio di attesa in fase di registrazione e per la modifica della foro del profilo.

#### Il DBMS

Il DBMS usato è MySql  il più popolare tra i DMBS, è Open Source e gratuito. Usato per piattaforme come Joomla e WordPress, consente la realizzazione di applicazioni professionali.MySql è uno dei principali componenti di XAMPP (X-Cross Platform, A-Apace, M-MySql, P-Php, P-Perl).

#### Web Server

Il server web usato per testare l’applicativo è XAMPP, una produzione di Apache che, in un unico pacchetto include: Un server web application (Apache), un DBMS (MySQL), e un linguaggio di script (PHP).
XAMPP è anche multi piattaforma (cross-platform). Ciò significa che funziona su ambienti Linux, Mac e Windows. XAMPP è open source. E' una raccolta di software gratuiti (paragonabile a una distribuzione Linux), è totalmente gratuita e la riproduzione è libera. Inoltre, dato che molti ambienti server utilizzano gli stessi componenti, XAMPP è utile in quanto rende semplice e intuitivo il passaggio da un sistema locale di test a un server web vero e proprio

#### Pingendo

Per la creazione dei vari template è stato usato Pingendo, un’applicazione che mette a disposizione strumenti appositamente dedicati alla prototipazione con Bootstrap, probabilmente il framework più popolare tra quelli disponibili sotto licenza Open Source per lo sviluppo di siti Web dotati di layout responsive e mobile-first. Si tratta sostanzialmente di una soluzione pensata per semplificare la realizzazione di frontend e basati sugli odierni Web standard (HTML5, CSS3 e JavaScript).


#### Smarty

Per separare la logica e il contenuto dell’applicazione, è stato usato Smarty, un motore di template per PHP. In particolare è stato utilizzato per la compilazione di quest’ultimi in maniera dinamica. 

#### L’idea

Society of Funding nasce da Serena, Oscar e Fabrizio, tre studenti dell'Università degli Studi dell'Aquila con un sogno: aiutare gli altri a realizzare i propri di sogni. 
SoF è una piattaforma di crowdfunding. Il termine Crowdfunding, del resto, deriva proprio dall'incrocio delle parole inglesi "crowd", folla, e "funding", finanziamento, indicando la pratica di "trovare fondi attraverso la folla", ossia una modalità di microfinanziamento dal basso che si avvale dell'aiuto di benefattori che scelgono di investire liberamente, ispirati dal progetto e dall'idea proposta. 
Questa forma di finanziamento alternativo, che può definirsi la raccolta fondi del nuovo millennio, rappresenta uno dei tanti ritrovati della sharing economy che per funzionare si avvale del mezzo più efficiente a disposizione nell'era 2.0, il web. 

#### Perché sceglierci

SoF è una piattaforma sicura e veloce. Abbiamo raccolto più di 4 miliardi di dollari per chi ne aveva bisogno.  Siamo i numeri uno al mondo  per la raccolta di fondi online.  Crea una fantastica raccolta fondi in meno di 30 secondi. Ottieni subito grandi risultati! Crea la tua campagna di raccolta fondi: raccontare la tua storia e ottenere aiuti finanziari non è mai stato così facile. SoF applica il più basso tasso per ogni donazione effettuata.

