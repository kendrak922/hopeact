# Block: News Listing

Custom news listing block
Ajax listing of news articles, used on news index page

---

## Block Documentation

News listing pulls in the "post" post type using the "hopeact_get_news" function located in "functions--news.php". To convert an article to a card object, it uses the "hopeact_postToCard" function located in "functions--card.php". (This is done with the articles' post id in the card molecule.)

The categories available to filter by are content managed. They can pick already created taxonomies.

The listing will prefilter the listing if a user clicked the category chip on an article card. (example of filtered link: "/impact-and-news/?cat=6")

---

## Possible next steps

TBD

---

## Style notes

Uses atomic design for consistent styling

### Atom:

- 'chip/chip' (mixin used on category filter on desktop, otherwise a jump nav)

### Molecule:

- 'cards/card'
