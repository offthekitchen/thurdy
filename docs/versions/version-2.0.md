# Version 2.0

**Status:** In progress  
**Base:** main

## Summary
Thurdy reads and writes through the shared datalayer, the same way the other sites do.

## Changes

### Features
- **datalayer** (version2.0-feature-datalayer): Replace the old class layer with the shared PDO repositories.
  - What changed: Public pages and shared helpers load songs, CDs, reviews, awards, performances, drops, and comments through `offthekitchen.com/datalayer`. Local Thurdy data classes were removed. Drop photos on the art and song pages use `images/drops/`.
  - Why: One data-access style across the sites, without the legacy mysqli classes.
- **syncable** (version2.0-syncable): Add a sync-licensing page with previews that play on the site.
  - What changed: `Syncable.php` lists Immortality, Afternoon with Einstein, Drive Myself Insane, You Don't Mean a Thing to Me, The Loop, and You're So Cute. Each song has instrumental and full players. `stream-sync.php` streams only those allowlisted files, and `.htaccess` refuses a direct request for the same filenames. The players have no download link. The homepage links to the sync page. Song descriptions other than Immortality are placeholder text.
  - Why: Someone considering a track for sync can listen on the page without being handed the MP3.

### Bugfixes

## Test notes
- Pages to check: home, Music, a CD, a song, Lyrics, Art, Drops, Where, Comment, tracks, Chatter, Syncable
- Syncable checks: each player plays and seeks; opening a protected MP3 directly is refused; an older public file such as `mp3/1.mp3` still plays
- Special setup steps: `DATALAYER_DIR` must point at the shared datalayer. `tracks.php` still reports `CANT GET TRACKS` when `thurdy_song` is not in this database.
