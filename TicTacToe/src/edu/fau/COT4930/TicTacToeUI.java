package edu.fau.COT4930;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.FlowLayout;
import java.awt.Font;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.Box;
import javax.swing.BoxLayout;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;


public class TicTacToeUI extends TicTacToe {
	
	public static void main(String[] args) 
	{
  		JFrame frame = new JFrame("TIC TAC TOE");
  		
  		//UI Grid
  		JPanel UIPanel = new JPanel();
  		UIPanel.setLayout(new BoxLayout(UIPanel, BoxLayout.Y_AXIS));
  		
  		
		//Game Grid
  		JPanel GridPanel = new JPanel(); 
  		GridPanel.setBackground(Color.white); 
  		GridPanel.setLayout(new GridLayout(3,3)); 
		
  		//Player Names Grid
  		JPanel PlayerGrid = new JPanel();
  		PlayerGrid.setLayout(new GridLayout(1,2));
  		
  		
  		
  		//******************TEXT FIELD*********************
		JLabel textField = new JLabel();
		textField.setText("TIC TAC TOE 2: REVENGE OF TOC");
		textField.setFont(new Font("Arial", Font.PLAIN, 18));
		
  		//******************TEXT FIELD*********************
		JTextField p1TextField = new JTextField(10);
		p1TextField.setText("Player 1");
		
  		//******************TEXT FIELD*********************
		JTextField p2TextField = new JTextField(10);
		p2TextField.setText("Player 2");
  		
  		
		//******************Grid Buttons*******************
		JButton GridButtons[] = new JButton[9];
		
		for(int i = 0; i<=8; i++){
			int gridsection = i;
			GridButtons[i] = new JButton();
			GridButtons[i].setText(" ");
			GridButtons[i].setFont(new Font("Arial", Font.PLAIN, 40));
			GridButtons[i].setPreferredSize(new Dimension(40, 80));
			GridButtons[i].addActionListener(new
			ActionListener()
			{
      			public void actionPerformed(ActionEvent event)
      			{
      				JButton buttonClicked = (JButton)event.getSource();
      				if(grid[gridsection].equals(" "))
      				{
      					PlayGrid(buttonClicked, currentPlayer, textField, gridsection, GridButtons);
      				}
     			}
			});
		
			//Grid Buttons to Panel
			GridPanel.add(GridButtons[i]);
		}
		
		
		//******************New Game Button***********************
		JButton NewGameButton = new JButton("Start a New Game");
		NewGameButton.addActionListener(new
   		ActionListener()
   		{
      			public void actionPerformed(ActionEvent event)
      			{
      				StartNewGame(p1TextField.getText(),p2TextField.getText(), textField, GridButtons);
     			}
   		});
		
		
		//**********************Frame*************************
		frame.setLayout(new FlowLayout());
		frame.setMinimumSize(new Dimension(550, 550));
		frame.setSize(new Dimension(550, 550));
		frame.setResizable(false);
		
		
		//Main Text to UI Panel
		UIPanel.add(Box.createRigidArea(new Dimension(0, 30)));
		UIPanel.add(textField);
		UIPanel.add(Box.createRigidArea(new Dimension(0, 30)));
		
		//Grid Panel to UIPanel
		UIPanel.add(GridPanel);
		UIPanel.add(Box.createRigidArea(new Dimension(0, 30)));
		
		//Player Name Texts to Player Panel
		PlayerGrid.add(p1TextField);
		PlayerGrid.add(p2TextField);
		UIPanel.add(Box.createRigidArea(new Dimension(0, 30)));
		
		//Player Name Panel to UI Panel
		UIPanel.add(PlayerGrid);
		
		//New Game Button to UI Panel
		UIPanel.add(NewGameButton);
		UIPanel.add(Box.createRigidArea(new Dimension(0, 30)));
		
		//UI to Frame
		frame.add(UIPanel);
		
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.pack();
		frame.setVisible(true);
	}
}
