// Stanford Portable Library
#include <spl/gwindow.h>

int main(void)
{
    // instantiate window
    GWindow window = newGWindow(320, 240);
 
    // let's look at it for a while
    pause(5000);

    // close window
    closeGWindow(window);
    return 0;
}
