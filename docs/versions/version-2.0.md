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

### Bugfixes

## Test notes
- Pages to check: home, Music, a CD, a song, Lyrics, Art, Drops, Where, Comment, tracks, Chatter
- Special setup steps: `DATALAYER_DIR` must point at the shared datalayer. `tracks.php` still reports `CANT GET TRACKS` when `thurdy_song` is not in this database.
