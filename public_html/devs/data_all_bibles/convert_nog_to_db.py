#!/usr/bin/env python3
"""
Convert Names of God Bible (NOG) JSON files to Pick DB format
Output: nog.db in Pick-Separated Values format (Char 254 delimited)
Format: Book + AM + Chapter + AM + Verse + AM + Text
"""

import json
import os
from pathlib import Path

# Pick DB delimiters
AM = chr(254)  # Attribute Mark - Primary field separator

# Canonical Bible book order (66 books)
BOOK_ORDER = [
    # Old Testament (39 books)
    "Genesis", "Exodus", "Leviticus", "Numbers", "Deuteronomy",
    "Joshua", "Judges", "Ruth", "1 Samuel", "2 Samuel",
    "1 Kings", "2 Kings", "1 Chronicles", "2 Chronicles",
    "Ezra", "Nehemiah", "Esther", "Job", "Psalms", "Proverbs",
    "Ecclesiastes", "Song of Songs", "Isaiah", "Jeremiah", "Lamentations",
    "Ezekiel", "Daniel", "Hosea", "Joel", "Amos",
    "Obadiah", "Jonah", "Micah", "Nahum", "Habakkuk",
    "Zephaniah", "Haggai", "Zechariah", "Malachi",
    # New Testament (27 books)
    "Matthew", "Mark", "Luke", "John", "Acts",
    "Romans", "1 Corinthians", "2 Corinthians", "Galatians", "Ephesians",
    "Philippians", "Colossians", "1 Thessalonians", "2 Thessalonians",
    "1 Timothy", "2 Timothy", "Titus", "Philemon",
    "Hebrews", "James", "1 Peter", "2 Peter",
    "1 John", "2 John", "3 John", "Jude", "Revelation"
]

def main():
    # Paths
    json_dir = Path("public_html/bible/devs/NOG/books")
    output_file = Path("public_html/bible/devs/nog.db")
    
    print(f"Converting NOG JSON files to Pick DB format...")
    print(f"Source: {json_dir}")
    print(f"Output: {output_file}")
    
    # Collect all verses
    all_verses = []
    verse_count = 0
    
    # Process books in canonical order
    for book_name in BOOK_ORDER:
        json_file = json_dir / f"{book_name}.json"
        
        if not json_file.exists():
            print(f"WARNING: Missing {book_name}.json")
            continue
        
        print(f"Processing {book_name}...")
        
        with open(json_file, 'r', encoding='utf-8') as f:
            data = json.load(f)
        
        # Navigate JSON structure: EN -> NOG -> BookName -> Chapter -> Verse
        book_data = data.get("EN", {}).get("NOG", {}).get(book_name, {})
        
        # Process each chapter
        for chapter_num in sorted(book_data.keys(), key=int):
            chapter_data = book_data[chapter_num]
            
            # Process each verse
            for verse_num in sorted(chapter_data.keys(), key=int):
                verse_text = chapter_data[verse_num]
                
                # Create Pick DB record: Book + AM + Chapter + AM + Verse + AM + Text
                record = f"{book_name}{AM}{chapter_num}{AM}{verse_num}{AM}{verse_text}\n"
                all_verses.append(record)
                verse_count += 1
    
    # Write to output file with UTF-8 encoding
    print(f"\nWriting {verse_count} verses to {output_file}...")
    with open(output_file, 'w', encoding='utf-8') as f:
        f.writelines(all_verses)
    
    print(f"✓ Successfully created nog.db with {verse_count} verses!")
    print(f"✓ File size: {output_file.stat().st_size:,} bytes")

if __name__ == "__main__":
    main()
