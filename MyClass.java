import java.awt.*;
import java.applet.*;
public class MyClass extends Applet {
    Button button1;
    public void init() {
    }
    public void paint(Graphics g) {
        Button button1 = new Button("Plot");
        add(button1);
        g.setColor(Color.blue);
        g.drawLine(600,0,600,1000);    // x-axis
        g.drawLine(0,350,1400,350);// y-axis
       for (int i=0;i<=1000;i++)
       {
        g.drawLine(i,(int)Math.sin(i),i,i);
        //Suppose to give me a graph 
                //even though at random location        
}
    }
}