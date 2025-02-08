# Block: News/Events Latest

Custom latest news/events block
Pulls the 3 latest news and 3 upcoming (or recently passed) events

---

## Block Documentation

For the block heading - Took advantage of acf clone fields to feed into an atomic molecule for consistent styling and data structure.

## Events

Events listing pulls in the "events" post type using the "hopeact_get_events" function located in "functions--events.php". To convert an event to a card object, it uses the "hopeact_eventToCard" function located in "functions--card.php". (This is done with the events' post id in the card molecule.)

It will only pull upcoming events

### News

News listing pulls in the "post" post type using the "hopeact_get_news" function located in "functions--news.php". To convert an article to a card object, it uses the "hopeact_postToCard" function located in "functions--card.php". (This is done with the articles' post id in the card molecule.)

It will pull the most recent articles

---

## Possible next steps

TBD

---

## Style notes

Uses atomic design for consistent styling

### Molecule:

- 'heading/block-heading'
- 'cards/card'
