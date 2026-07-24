import urllib.request
import urllib.parse
import json
import os
import re
import html.parser
from html.parser import HTMLParser

class ChapterParser(HTMLParser):
    def __init__(self):
        super().__init__()
        self.in_list = False
        self.chapters = []
        self.current_tag = ""
        
    def handle_starttag(self, tag, attrs):
        attrs_dict = dict(attrs)
        if tag == "ul" and attrs_dict.get("class") == "wporg-chapter-list__list":
            self.in_list = True
        if self.in_list and tag == "a":
            href = attrs_dict.get("href")
            if href and "developer.wordpress.org/themes/" in href:
                self.chapters.append(href)
                
    def handle_endtag(self, tag):
        pass

def fetch_html(url):
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    try:
        with urllib.request.urlopen(req) as response:
            return response.read().decode('utf-8')
    except Exception as e:
        print(f"Error fetching {url}: {e}")
        return ""

def main():
    print("Fetching main page...")
    main_html = fetch_html("https://developer.wordpress.org/themes/")
    parser = ChapterParser()
    parser.feed(main_html)
    
    # Filter unique and valid chapters
    chapters = []
    seen = set()
    for link in parser.chapters:
        # Normalize link
        link = link.split('#')[0]
        if link not in seen and link != "https://developer.wordpress.org/themes/":
            seen.add(link)
            chapters.append(link)
            
    print(f"Found {len(chapters)} chapters.")
    
    out_dir = "/home/pronabjyoti/Desktop/Zelocorecms/Zelocorecms/docs/theme-development"
    os.makedirs(out_dir, exist_ok=True)
    
    for i, url in enumerate(chapters):
        print(f"Fetching chapter {i+1}/{len(chapters)}: {url}")
        # Try to use the ?output_format=md trick if supported, else just strip HTML
        md_url = url + ("" if "?" in url else "?") + "output_format=md"
        # Since output_format=md is an LLM hint for read_url_content, let's just fetch it normally
        # and do a basic conversion, or perhaps we can use a simpler approach.
        # Actually, let's just use the markdown endpoint if it works.
        content = fetch_html(md_url)
        if not content:
            content = fetch_html(url)
        
        # very basic html to markdown if ?output_format=md didn't return markdown
        if "<html" in content[:200].lower():
            # Basic strip
            content = re.sub(r'<style.*?>.*?</style>', '', content, flags=re.DOTALL)
            content = re.sub(r'<script.*?>.*?</script>', '', content, flags=re.DOTALL)
            content = re.sub(r'<[^>]+>', ' ', content)
            content = re.sub(r'\s+', ' ', content).strip()
            
        # Determine filename
        slug = [p for p in url.split('/') if p][-1]
        filename = f"{i+1:02d}-{slug}.md"
        filepath = os.path.join(out_dir, filename)
        
        # Prepend frontmatter for Zelocorecms
        final_content = f"# {slug.replace('-', ' ').title()}\n\n"
        final_content += f"Source: {url}\n\n"
        final_content += content
        
        with open(filepath, "w", encoding="utf-8") as f:
            f.write(final_content)
            
    print("Done!")

if __name__ == "__main__":
    main()
