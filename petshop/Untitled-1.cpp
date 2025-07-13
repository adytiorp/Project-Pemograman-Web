#include <GL/glut.h>
void display(){ glClear(GL_COLOR_BUFFER_BIT); glFlush(); }
int main(int argc, char** argv){
    glutInit(&argc, argv);
    glutInitWindowSize(200,200);
    glutCreateWindow("Test");
    glutDisplayFunc(display);
    glutMainLoop();
    return 0;
}