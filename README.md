> :warning: This project is in alpha stage

# Slimey
Slimey is a Slim 4 Skeleton that uses Slim PSR-7 implementation, PHP-DI container and Twig template engine. Slimey is more than just a skeleton: it's a teeny tiny framework built on top of Slim.

By default, Slim isn't bundled with many tools and libraries you would need in a typical project. So Slimey gives you a skeleton with those tools already bundled in―plus some useful global helper utilies―so you can start coding instantly.

# Installation
You would install Slimey just like how you would install any other skeleton. For more elobration: (1) download this repo, (2) extract it to a folder, (3) `cd into/the/folder/`, (4) and run `composer install`; that's it! Now, make sure you configure it before running.

# Configuration
Slimey uses a dotenv file to store the configuration settings. A sample config is given in `./config/.env.sample`. You have to copy that file by running `cp ./config/.env.sample ./config/.env` from the root of the project. 

# Todo
- [ ] Write documentation
- [ ] Add a DB Migration tool
- [ ] Add an Authentication/Session management library
- [ ] Implement session-based flash message utility
- [ ] Give user ability to change default libraries to their own ones

# License
Slimey doesn't have any license. Meaning, that it's in the public domain. You are permitted to copy, modify, publish, use, sell or compile whole or part of it—for commercial, non-commercial, or for any other use―as many times as you wish. You are free to do whatever you like. Attribution is not necessary. But hey, if you give me an attribution, that's so sweet of you.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
